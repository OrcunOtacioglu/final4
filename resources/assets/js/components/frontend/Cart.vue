<template>
    <!-- Shopping Cart -->
    <li>
        <div class="dropdown dropdown-cart">
            <a id="basketicon" href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="cartloading" style="display:none;">
                    <i class="font-50 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;"></i>
                </div>
                <i class="pe-7s-cart font-26"></i>
                <span class="cart-length">{{ items.length }}</span>
            </a>
            <ul v-bind:class="{ displayBlock: showCart, 'dropdown-menu': true}">

                <!-- If the Cart is empty-->
                <li v-if="items.length === 0" class="w100 t-center font-14 pl0 pr0 pb10">
                    <i class="icon-frown font-16"></i>
                    Your cart is empty
                </li>

                <!-- If the Cart has Items -->
                <li v-if="items.length > 0" class="relative cart-items" v-for="item in items">

                    <!-- If the Item type is Seat -->
                    <div class="cart-wrapper w100 p0">
                        <!--<div class="image">-->
                            <!--<img :src="item.details.image" :alt="item.name">-->
                        <!--</div>-->
                        <div class="font-12 mb5 text-dot color-black pr30">{{ item.name }}</div>
                        <!--<span class="font-bold font-14 color-black">{{ item.details.zone }}</span>-->
                    </div>
                    <a class="action remove-basket" style="cursor:pointer;" v-on:click="remove(item)">
                        <i class="icon-trash"></i>
                    </a>

                </li>

                <!-- If the cart has hotel -->
                <li v-if="hasHotel" class="">
                    <div class="col-sm-6 p8 font-bold font-14" style="padding-left:0 !important; padding-right:0 !important;">
                        Total:
                        <span>{{ total }} €</span>
                    </div>
                    <a href="/hotel" class="button_drop outline">PROCEED</a>
                </li>

                <!-- If the cart has only ticket -->
                <li v-else-if="hasTicket" class="">
                    <a href="#" v-on:click="sendCartData()" class="button_drop outline">SELECT HOTEL</a>
                </li>
            </ul>
        </div>
    </li>
    <!-- End Shopping Cart -->
</template>

<script>
    export default {
        data: function () {
            return {
                items: [],
                hasHotel: false,
                hasTicket: false,
                showCart: false,
                ticketCount: 0,
                hotelCount: 0,
                total: 0,
            }
        },
        methods: {
            add: function (item) {
                this.items.push(item);
                if (item.type === 'seat') {
                    this.ticketCount += 1;
                } else {
                    this.hotelCount += 1;
                }
                this.calculateCart();
            },
            remove: function (item) {
                this.items.splice(this.items.indexOf(item), 1);
                if (item.type === 'seat') {
                    this.ticketCount -= 1;
                } else {
                    this.hotelCount -= 0;
                }
                this.calculateCart();
            },
            getItemCount: function () {
                return this.items.length;
            },
            calculateCart: function () {

                if (this.getItemCount() > 0) {
                    this.showCart = true;

                } else {
                    this.showCart = false;
                }

                if (this.hotelCount > 0) {
                    this.hasHotel = true;
                    this.hasTicket = false;

                } else if (this.ticketCount > 0) {
                    this.hasTicket = true;
                }

                // Send the items to an API endpoint to calculate the total
            },
            sendCartData: function () {
                axios({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',
                    url: '/cart',
                    data: {
                        items: this.items
                    }
                })
                    .then(response => {
                        if (response.data.status === 0) {
                            if (response.data.reference !== null) {
                                swal({
                                    title: 'Oops!',
                                    text: 'You can not purchase more than 8 tickets!',
                                    icon: 'warning',
                                    buttons: {
                                        confirm: {
                                            text: 'View Current Package',
                                            value: true,
                                            visible: true,
                                            closeModal: true
                                        }
                                    }
                                }).then(function (result) {
                                    if (result) {
                                        window.location.replace('/hotel');
                                    } else {
                                        window.location.replace('/hotel');
                                    }
                                });
                            } else {
                                swal(response.data.message, 'Please try again!', 'warning');
                            }
                        } else {
                            if (response.data.reference === undefined) {
                                swal('Problem occured!', 'Please try again!', 'error');
                            } else {
                                window.location.replace('/hotel');
                            }
                        }
                    })
                    .catch(error => {
                        swal('Problem occured!', 'Please try again!', 'error');
                    });
            },
            getCart: function () {
                let cart = $('meta[name="cart"]').attr('content');

                axios.get('/cart/' + cart)
                    .then(response => {
                        if (response.data.items !== null) {
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
    .displayBlock {
        display: block;
    }
</style>