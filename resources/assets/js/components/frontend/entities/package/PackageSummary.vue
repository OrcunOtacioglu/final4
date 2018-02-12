<template>
    <!-- Right Side & Summary -->
    <aside class="col-md-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
            <div class="box_style_1">
                <h3 class="inner">Package Summary</h3>
                <table class="table table_summary">
                    <tbody>
                    <tr v-for="item in items">
                        <td>
                            <h5 class="mt0 mb3 font-13 ng-binding">{{ item.details }}</h5>
                        </td>
                        <td class="text-right font-14">
                            <strong>{{ item.name }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="mt0 mb3 font-14 fr">
                                <strong>Subtotal</strong>
                            </h5>
                        </td>
                        <td class="text-right font-14">
                            <strong>{{ subtotal }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="mt0 mb3 font-14 fr">
                                <strong>Service Fees</strong>
                            </h5>
                        </td>
                        <td class="text-right font-14">
                            <strong>{{ serviceFees }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="mt0 mb3 font-14 fr">
                                <strong>Total Price</strong>
                            </h5>
                        </td>
                        <td class="text-right font-14">
                            <strong>{{ total }}</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div id="policy" class="p0">
                    <h4 class="font-16 font-600 mb5">Cancellation policy</h4>
                    <div class="form-group mb10">
                        <label class="font-12">
                            <input style="margin:0 5px 0 0;" data-required="checkbox" required="" name="policy_terms" id="policy_terms" type="checkbox">I accept terms and conditions and general policy.
                        </label>
                    </div>
                </div>
                <a class="btn_full">Continue Booking</a>
                <div id="sendtosteploading" style="display:none;">
                    <h5 class="font-500 mb20 color-white">Please wait...</h5>
                    <i class="font-50 loading-icon icon-spin6 animate-spin"></i>
                </div>
            </div>
        </div>
    </aside>
    <!-- End Summary -->
</template>

<script>
    export default {
        data: function () {
            return {
                items: [],
                subtotal: null,
                total: null,
                serviceFees: null
            }
        },
        methods: {
            getCart: function () {
                let cart = $('meta[name="cart"]').attr('content');

                axios.get('/cart/' + cart)
                    .then(response => {
                        if (response.data.items !== null) {
                            this.subtotal = response.data.subtotal;
                            this.serviceFees = response.data.serviceFees;
                            this.total = response.data.total;
                            this.items = response.data.items;
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        mounted() {
            this.getCart();
        }
    }
</script>

<style scoped>

</style>