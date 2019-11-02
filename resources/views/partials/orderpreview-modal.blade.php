<!-- template for the modal component -->
<script type="x/template" id="orderpreview-modal-template">
    <div class="modal-mask" v-show="show_modal" transition="modal">
        <div class="modal-wrapper">
            <div class="modal-container">

                <div class="modal-header">
                    <slot name="header">
                        <h2>Preview My Order</h2>
                    </slot>
                </div>

                <div class="modal-body">
                    <slot name="body">
                        <table class="table-responsive table-stripe">
                            <tbody>
                                <tr>
                                    <th>Ship To:</th>
                                </tr>
                                <tr>
                                    <td>@{{ first_name  }} @{{ last_name }}</td>
                                </tr>
                                <tr>
                                    <td>@{{ address }} @{{ address2 }}</td>
                                </tr>
                                <tr>
                                    <td>@{{ city }}, @{{ state }} @{{ zip }}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <th>Email (and UserName)</th>
                                </tr>
                                <tr>
                                    <td>@{{ email }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <table class="table" border="1" cellpadding="2" cellspacing="2">
                            <tbody>
                                <tr>
                                    <th colspan="3">Item(s)</th>
                                </tr>
                                <tr>
                                    <th>Quantity</th><th>Quantity</th></th><th>Cost</th>
                                </tr>
                                <tr v-if="sticker_quantity > 0">
                                    <td>Bumper Stickers</td>
                                    <td style="direction: rtl">@{{ sticker_quantity }}</td>
                                    <td style="direction: rtl">@{{ sticker_cost | currency }}</td>
                                </tr>
                                <tr v-if="tshirt_s_quantity > 0">
                                    <td>Small T-Shirts</td>
                                    <td style="direction: rtl">@{{ tshirt_s_quantity }}</td>
                                    <td style="direction: rtl">@{{ tshirt_s_cost | currency }}</td>
                                </tr>
                                <tr v-if="tshirt_m_quantity > 0">
                                    <td>Medium T-Shirts</td>
                                    <td style="direction: rtl">@{{ tshirt_m_quantity }}</td>
                                    <td style="direction: rtl">@{{ tshirt_m_cost | currency }}</td>
                                </tr>
                                <tr v-if="tshirt_l_quantity > 0">
                                    <td>Large T-Shirts</td>
                                    <td style="direction: rtl">@{{ tshirt_l_quantity }}</td>
                                    <td style="direction: rtl">@{{ tshirt_l_cost | currency }}</td>
                                </tr>
                                <tr v-if="tshirt_xl_quantity > 0">
                                    <td>XL T-Shirts</td>
                                    <td style="direction: rtl">@{{ tshirt_xl_quantity }}</td>
                                    <td style="direction: rtl">@{{ tshirt_xl_cost | currency }}</td>
                                </tr>
                                <tr v-if="tshirt_xxl_quantity > 0">
                                    <td>XXL T-Shirts</td>
                                    <td style="direction: rtl">@{{ tshirt_xxl_quantity }}</td>
                                    <td style="direction: rtl">@{{ tshirt_xxl_cost | currency }}</td>
                                </tr>
                                <tr v-if="sticker_quantity > 0">
                                    <td colspan="2">Shipping</td>
                                    <td style="direction: rtl">@{{ sticker_shipping_cost | currency }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Total Cost</th>
                                    <td style="direction: rtl">@{{ sticker_cost + sticker_shipping_cost + tshirt_cost | currency }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <button class="btn btn-default" @click="show_modal = false" v-show="!processing">Modify</button>
                        <button id="orderSubmit" class="btn btn-primary" @click.prevent="processOrder()" v-show="!processing">@{{ order_button_text }}</button>
                        <span v-show="processing"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span>Processing...</span></span>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</script>