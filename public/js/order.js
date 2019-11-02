Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrftoken').getAttribute('content');
Vue.component('gbac-orderpreview-modal', {
    template: '#orderpreview-modal-template',
    props: [
        'show_modal',
        'sticker_quantity',
        'sticker_cost',
        'sticker_shipping_cost',
        'tshirt_cost',
        'tshirt_s_quantity',
        'tshirt_m_quantity',
        'tshirt_l_quantity',
        'tshirt_xl_quantity',
        'tshirt_xxl_quantity',
        'tshirt_s_cost',
        'tshirt_m_cost',
        'tshirt_l_cost',
        'tshirt_xl_cost',
        'tshirt_xxl_cost',
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'order_button_text',
        'processing'
    ],

    data: function() {
        return {
        };
    },

    ready: function() {
        this.order_button_text = 'Order Now!';
    },

    methods: {
        // From modal page, we click on order button then hand it back over to main vue object
        processOrder: function() {
            this.processing = true;
            vm.postOrder();
        }
    }
});

var vm = new Vue({
    el: '#orderApp',

    data: {
        email: '',
        first_name: '',
        last_name: '',
        address: '',
        address2: '',
        city: '',
        state: '',
        zip: '',
        ccnumber: '',
        cvc: '',
        exp_month: '',
        exp_year: '',
        //password: '',
        //password_confirmation: '',
        errors: {email:0, ccnumber:0, cvc:0, first_name:0, last_name: 0, password: 0, password_confirmation: 0, address: 0, city: 0, state: 0, zip: 0 },
        sticker_cost: 0,
        sticker_shipping_cost: 0,
        sticker_quantity: 0,
        tshirt_cost: 0,
        tshirt_s_cost: 0,
        tshirt_m_cost: 0,
        tshirt_l_cost: 0,
        tshirt_xl_cost: 0,
        tshirt_xxl_cost: 0,
        tshirt_s_quantity: 0,
        tshirt_m_quantity: 0,
        tshirt_l_quantity: 0,
        tshirt_xl_quantity: 0,
        tshirt_xxl_quantity: 0,
        show_modal: false,
        showOrderPreview: false,
        disable_submit: true,
        states: '',
        stripeToken: '',
        order_button_text: '',
        processing: false,
        cc_errors: '',
        prices: []
    },

    ready: function() {
        states = this.getStateList('US');
        prices = this.getPrices();
    },

    methods: {
        validateFormField: function(rule, value, value2) {
            if (! value) { return true; }
            var resource = this.$resource('/orders/validateFormField{/rule}{/value}{/value2?}');
            resource.get({ rule : rule, value : value, value2 : value2 }).then(function (response) {
                if (response.data[rule] && response.data[rule][0])
                {
                    this.errors[rule] = response.data[rule][0];
                }
            }.bind(this));
        },

        /*
         *  Not used right now - need to handle non-unique emails - let them login b4 ordering
         *  But, even when I get there, can prob delete this and use above method with laravle email validation unique
         */
        validateUnique: function(rule, value) {
            var resource = this.$resource('/orders/verifyUser{/email}');
            resource.get({ email : value }).then(function (response) {
                if (response.data == 0)
                {
                    this.errors.email = 1;
                }
            }.bind(this));
        },

        /*
         * Local validations for credit card data
         */
        validateLocal: function(rule, value) {
            //console.log( rule, value);
            if (rule == 'ccnumber') {
                value = value.replace(/\D/g,'');
                if (value.length != 16) {
                    this.errors[rule] = "Please enter valid 16 digit credit card number"
                }
                if (value.substring(0,1) != 4 && value.substring(0,1) != 5) {
                    this.errors[rule] = "We currently only accept Visa & Mastercard.";
                }
            } else if (rule == 'cvc') {
                if (value.match(/^\d{3}$/) == null) {
                    this.errors[rule] = "CVC Must be 3 digits."
                }
            } else if (rule == 'zip') {
                if (value.match(/^\d{5}$/) == null) {
                    this.errors[rule] = "Zip Must be 5 digits."
                }
            }
        },

        getStateList: function(country) {
            var resource = this.$resource('/country-state/get-states/' + country);
            resource.get({ country : country}).then(function (response) {
                this.states =  response.data;
            }.bind(this));
        },

        getPrices: function() {
            var resource = this.$resource('/orders/getPrices/');
            resource.get().then(function (response) {
                this.prices =  response.data;
            }.bind(this));
        },

        /*
         * 2 Steps
         *  1 - get stripe token
         *  2 - In responseHandler, post form, else hide modal and display error msg
         */
        postOrder: function() {
            vm.getStripeToken();
        },

        getStripeToken: function() {
            var stripeKey = $('meta[name="publishable-key"]').attr('content');
            Stripe.setPublishableKey(stripeKey);

            Stripe.card.createToken({
                number: this.ccnumber,
                cvc: this.cvc,
                exp_month: this.exp_month,
                exp_year: this.exp_year
            }, $.proxy(vm.stripeResponseHandler, this));
        },

        stripeResponseHandler: function(status, response) {
            // If we get errors, let them know cc info is a problem
            if (response.error) {
                this.showOrderPreview = false;
                this.processing = false;
                this.cc_errors = response.error.message;
                this.cvc = '';  // blank out will trigger blur of submit button
                this.showOrderPreview = false;
                return '';
            }

            // use jQuery to add hidden input to dom with the Stripe Token (value in response.id)
            var orderForm = $('#order-form');
            $('<input>', {
                type: 'hidden',
                name: 'stripeToken',
                value: response.id
            }).appendTo(orderForm);
            this.showOrderPreview = false;

            // Submit the form with the token and let server side write data and make stripe payment
            orderForm[0].submit();
        }
    },

    computed: {
        sticker_cost: function() {
            return this.prices[1] * this.sticker_quantity;
        },

        tshirt_cost: function() {
            return this.prices[2] * (+this.tshirt_s_quantity + +this.tshirt_m_quantity + +this.tshirt_l_quantity + +this.tshirt_xl_quantity + +this.tshirt_xxl_quantity);
        },

        tshirt_s_cost: function() {
            return this.prices[2] * (+this.tshirt_s_quantity);
        },

        tshirt_m_cost: function() {
            return this.prices[2] * (+this.tshirt_m_quantity);
        },

        tshirt_l_cost: function() {
            return this.prices[2] * (+this.tshirt_l_quantity);
        },

        tshirt_xl_cost: function() {
            return this.prices[2] * (+this.tshirt_xl_quantity);
        },

        tshirt_xxl_cost: function() {
            return this.prices[2] * (+this.tshirt_xxl_quantity);
        },

        sticker_shipping_cost: function() {
            if (this.sticker_quantity > 0) {
                return Math.ceil(this.sticker_quantity/5) * 0.75;
            }

            return 0;
        },

        disable_submit: function() {
            return ! (this.email && this.first_name && this.last_name && this.address && this.city && this.state && this.zip && this.ccnumber && this.cvc);
        }
    }

});

