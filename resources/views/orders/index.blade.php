<!-- TODO See bottom of page for notes on where to pick up -->
@extends('layouts.default')
@section('content')
@include('partials.orderpreview-modal')
<!-- Page Content  - id=orderApp giving entire page to Vue.js -->
<div class="container">
    <div class="row text-center">
        <br>
        <h3 class="sticker-red">Support Our Vets!!  Get Your Bumper Stickers & T-Shirts</h3><br><br>
    </div>
    <div id="orderApp">
        <form id="order-form" method="POST" action="/orders/process">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1">
                <div class="row">                           <!-- row in row to be void of size of adjacent column -->
                    <div class="col-lg-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">How Many Stickers Do You Need?</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>
                                        Bumper Stickers! @{{ prices[1] }} each &nbsp;
                                    </label>
                                    <input type="number"
                                           name="1"
                                           id="sticker_quantity"
                                           v-model="sticker_quantity"
                                           value="5"
                                           min="0"
                                           max="9999"
                                           style="direction: rtl"
                                    >
                                    <br>
                                    <img src="/img/GBOVets_sticker.jpg" border="1" height="25px" class="imageheight">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                           <!-- row in row to be void of size of adjacent column -->
                    <div class="col-lg-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">How Many T-Shirts Do You Need?</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <table border="0" cellpadding="2" cellspacing="2">
                                        <tr>
                                            <th colspan="3">Quality T-Shirts only @{{ prices[2] }} each<br>&nbsp;</th>  <!-- TODO get price from db -->
                                        </tr>
                                        <tr>
                                            <td rowspan="5">
                                                <img src="/img/GBOV_tshirt_front.jpg" border="1" height="75px" class="imageheight">
                                                <img src="/img/GBOV_tshirt_back.jpg" border="1" height="75px" class="imageheight">
                                            </td>
                                            <td>
                                                <label>
                                                    &nbsp; Small &nbsp;
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="2"
                                                       id="tshirt_s_quantity"
                                                       v-model="tshirt_s_quantity"
                                                       value="0"
                                                       min="0"
                                                       max="9999"
                                                       style="direction: rtl"
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    &nbsp; Medium &nbsp;
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="3"
                                                       id="tshirt_m_quantity"
                                                       v-model="tshirt_m_quantity"
                                                       value="0"
                                                       min="0"
                                                       max="9999"
                                                       style="direction: rtl"
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    &nbsp; Large &nbsp;
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="4"
                                                       id="tshirt_l_quantity"
                                                       v-model="tshirt_l_quantity"
                                                       value="1"
                                                       min="0"
                                                       max="9999"
                                                       style="direction: rtl"
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    &nbsp; XL &nbsp;
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="5"
                                                       id="tshirt_xl_quantity"
                                                       v-model="tshirt_xl_quantity"
                                                       value="0"
                                                       min="0"
                                                       max="9999"
                                                       style="direction: rtl"
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    &nbsp; XXL &nbsp;
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="6"
                                                       id="tshirt_xxl_quantity"
                                                       v-model="tshirt_xxl_quantity"
                                                       value="0"
                                                       min="0"
                                                       max="9999"
                                                       style="direction: rtl"
                                                >
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-lg-offset-1">
                <div class="row">
                    <div class="col-lg-12">
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading">Choose Your Credentials</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<!-- Email -->--}}
                                {{--<div class="form-group">--}}
                                    {{--<input type="text"--}}
                                           {{--name="email"--}}
                                           {{--id="email"--}}
                                           {{--required--}}
                                           {{--placeholder="Email Address*"--}}
                                           {{--size="40"--}}
                                           {{--v-model="email"--}}
                                           {{--value=""--}}
                                    {{--@blur="validateUnique('email', email)"--}}
                                    {{--@keydown="errors.email = false"--}}
                                    {{-->--}}
                                    {{--<span class="Error"--}}
                                          {{--v-show="errors.email"--}}
                                          {{--v-cloak--}}
                                    {{-->--}}
                                        {{--Email taken. Do you already have an account?--}}
                                    {{--</span>--}}
                                {{--</div>--}}

                                {{--<!-- Password -->--}}
                                {{--<div class="form-group">--}}
                                    {{--<input id="password"--}}
                                           {{--name="password"--}}
                                           {{--type="password"--}}
                                           {{--placeholder="Desired Password*"--}}
                                           {{--size="40"--}}
                                           {{--required--}}
                                           {{--v-model="password"--}}
                                           {{--value=""--}}
                                    {{--@blur="validateFormField('password', password)"--}}
                                    {{--@keydown="errors.password = false"--}}
                                    {{-->--}}
                                    {{--<span class="Error"--}}
                                          {{--v-show="errors.password"--}}
                                          {{--v-cloak--}}
                                    {{-->--}}
                                        {{--The Password is required and must be a minimum of 8 characters.--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<input id="password_confirmation"--}}
                                           {{--name="password_confirmation"--}}
                                           {{--type="password"--}}
                                           {{--placeholder="Repeat Password*"--}}
                                           {{--size="40"--}}
                                           {{--required--}}
                                           {{--v-model="password_confirmation"--}}
                                           {{--value=""--}}
                                    {{--@blur="validateFormField('password_confirmation', password_confirmation, password)"--}}
                                    {{--@keydown="errors.password_confirmation = false"--}}
                                    {{-->--}}
                                    {{--<span class="Error"--}}
                                          {{--v-show="errors.password_confirmation"--}}
                                          {{--v-cloak--}}
                                    {{-->--}}
                                        {{--The Passwords must match and be at least 8 characters long.--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="panel-footer">--}}
                                {{--We will create an account for you so we can update you on your orders.--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">FREE Shipping - Where Do We Send Your Order?</div>
                            <div class="panel-body">
                                <!-- Email -->
                                <div class="form-group">
                                    <input type="text"
                                        name="email"
                                        id="email"
                                        required
                                        placeholder="Email Address*"
                                        size="40"
                                        v-model="email"
                                        value=""
                                        {{--@blur="validateUnique('email', email)"--}}
                                        @blur="validateFormField('email', email)"
                                        @keydown="errors.email = false"
                                    >
                                    <span class="Error"
                                          v-show="errors.email"
                                          v-cloak
                                    >
                                        {{--Email taken. Do you already have an account?--}}
                                        Please enter valid email address.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        name="first_name"
                                        id="first_name"
                                        required
                                        placeholder="First Name*"
                                        size="20"
                                        v-model="first_name"
                                        @blur="validateFormField('first_name', first_name)"
                                        @keydown="errors.first_name = false"
                                    >
                                    <span class="Error"
                                        v-if="errors.first_name"
                                        v-cloak
                                    >
                                        @{{ errors.first_name }}
                                    </span>
                                    &nbsp;
                                    <input type="text"
                                        name="last_name"
                                        id="last_name"
                                        placeholder="Last Name*"
                                        size="20"
                                        v-model="last_name"
                                        required
                                        @blur="validateFormField('last_name', last_name)"
                                        @keydown="errors.last_name = false"
                                    >
                                    <span class="Error"
                                        v-if="errors.last_name"
                                        v-cloak
                                    >
                                        @{{ errors.last_name }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        name="address"
                                        id="address"
                                        required
                                        placeholder="Street Address*"
                                        size="30"
                                        v-model="address"
                                        @blur="validateFormField('address', address)"
                                        @keydown="errors.address = false"
                                    >
                                    <span class="Error"
                                        v-if="errors.address"
                                        v-cloak
                                    >
                                        @{{ errors.address }}
                                    </span>
                                    &nbsp;
                                    <input type="text"
                                           name="address2"
                                           id="address2"
                                           placeholder="Apt/Suite"
                                           size="10"
                                           v-model="address2"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        name="city"
                                        id="city"
                                        required
                                        placeholder="City*"
                                        size="20"
                                        v-model="city"
                                        @blur="validateFormField('city', city)"
                                        @keydown="errors.city = false"
                                    >
                                    <span class="Error"
                                        v-if="errors.city"
                                        v-cloak
                                    >
                                        @{{ errors.city }}
                                    </span>
                                    &nbsp;
                                    <select v-model="state" name="state">
                                        <option value="">State*</option>
                                        <option v-for="value in states['states']" v-bind:value="$key">
                                            @{{ $key }}
                                        </option>
                                    </select>
                                    <input type="text"
                                        name="zip"
                                        id="zip"
                                        required
                                        placeholder="Zip Code*"
                                        size="10"
                                        v-model="zip"
                                        @blur="validateLocal('zip', zip)"
                                        @keydown="errors.zip = false"
                                    >
                                    <span class="Error pull-right"
                                        v-if="errors.zip"
                                        v-cloak
                                    >
                                        @{{ errors.zip }}
                                    </span>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Provide A Payment Method</div>
                            <div class="panel-body">
                                <!-- Email -->
                                <div class="form-group">
                                    <input type="text"
                                        data-stripe=“number"
                                        id="ccnumber"
                                        required
                                        placeholder="Credit Card Number*"
                                        size="40"
                                        v-model="ccnumber"
                                        value=""
                                        {{--@blur="validateFormField('ccnumber', ccnumber)"--}}
                                        @blur="validateLocal('ccnumber', ccnumber)"
                                        @keydown="errors.ccnumber = false"
                                    >
                                    <span class="Error"
                                          v-show="errors.ccnumber"
                                          v-cloak
                                    >
                                        The Credit Card must be 16 digits and a valid Visa or MasterCard Number.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <select data-stripe=“exp_month"
                                        id="exp_month"
                                        v-model="exp_month"
                                    >
                                        <?php $months = \App\Helpers\Functions::monthSelectData(); ?>
                                        <option value="">Exp Month*</option>
                                        <?php foreach ($months as $key => $val) { echo "<option value=$key>$val</options>"; } ?>
                                    </select>
                                    &nbsp;
                                    <select data-stripe=“exp_year"
                                            id="exp_year"
                                            v-model="exp_year"
                                    >
                                        <?php $years = \App\Helpers\Functions::yearSelectData(); ?>
                                        <option value="">Exp Year*</option>
                                        <?php foreach ($years as $key => $val) { echo "<option value=$key>$val</options>"; } ?>
                                    </select>
                                    &nbsp;
                                    <input type="text"
                                        data-stripe=“cvc"
                                        id="cvc"
                                        required
                                        placeholder="CVC*"
                                        size="4"
                                        v-model="cvc"
                                        @blur="validateLocal('cvc', cvc)"
                                        @keydown="errors.cvc = false"
                                    >
                                    <span class="Error"
                                          v-show="errors.cvc"
                                          v-cloak
                                    >
                                        The CVC must be 3 digits.
                                    </span>
                                </div>
                                <div class="Error"
                                     v-show="cc_errors"
                                     v-cloak
                                >
                                    @{{ cc_errors }}
                                </div>
                            </div>
                            <div class="panel-footer">
                                We never store your credit card data.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">You're Done - Preview Your Order</div>
                            <div class="panel-body text-center">
                                <table class="table table-stripe" cellpadding="3" cellspacing="13" border="1">
                                    <tr>
                                        <th>Total Cost of Items</th><td style="text-align: right;">@{{ sticker_cost + tshirt_cost | currency }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th><td style="text-align: right;">@{{ sticker_shipping_cost | currency }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th><td style="text-align: right;">@{{ sticker_cost + tshirt_cost + sticker_shipping_cost | currency }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right;">
                                            <button id="preview-order" @click.prevent="showOrderPreview = true" :class="{ 'btn-success' : ! disable_submit }" :disabled="disable_submit">Preview My Order</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="panel-footer" v-show="disable_submit">
                                <span style="color: green;">*required -- Enter all required data to activate button</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="shipping_cost" id="shipping_cost" value="@{{ sticker_shipping_cost }}">
        </form>
        {{--@{{ $data | json }}--}}
        <gbac-orderpreview-modal :show_modal.sync="showOrderPreview"
                                 :sticker_quantity.sync="sticker_quantity"
                                 :sticker_cost="sticker_cost"
                                 :sticker_shipping_cost="sticker_shipping_cost"
                                 :tshirt_s_quantity="tshirt_s_quantity"
                                 :tshirt_m_quantity="tshirt_m_quantity"
                                 :tshirt_l_quantity="tshirt_l_quantity"
                                 :tshirt_xl_quantity="tshirt_xl_quantity"
                                 :tshirt_xxl_quantity="tshirt_xxl_quantity"
                                 :tshirt_cost="tshirt_cost"
                                 :tshirt_s_cost="tshirt_s_cost"
                                 :tshirt_m_cost="tshirt_m_cost"
                                 :tshirt_l_cost="tshirt_l_cost"
                                 :tshirt_xl_cost="tshirt_xl_cost"
                                 :tshirt_xxl_cost="tshirt_xxl_cost"
                                 :email.sync="email"
                                 :password.sync="password"
                                 :first_name.sync="first_name"
                                 :last_name.sync="last_name"
                                 :address.sync="address"
                                 :address2.sync="address2"
                                 :city.sync="city"
                                 :state.sync="state"
                                 :zip.sync="zip"
                                 :order_button_text.sync="order_button_text"
                                 :processing.sync="processing"
        >
        </gbac-orderpreview-modal>
    </div>

</div>
<script src="https://js.stripe.com/v2/"></script>
<script src="/js/order.js"></script>
@stop