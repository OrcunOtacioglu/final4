<template>
    <aside id="sidebar">
        <div v-bind:class="{ displayBlock: loadingEffect, displayNone: !loadingEffect, 'cartloading': true}">
            <i class="font-50 loading-icon icon-spin6 animate-spin" style="z-index: 1;"></i>
        </div>
        <table class="table text-left">
            <thead class="detur-thead">
            <tr>
                <th colspan="4" class="text-center">
                    <h3 class="package">PACKAGE SUMMARY</h3>
                </th>
            </tr>
            </thead>
            <tbody style="background: #ffffff;">
            <tr v-for="item in items">
                <td colspan="4" class="bt-none">
                    <p class="mb-0">{{ item.details }}</p>
                    <small>{{ item.name }}</small>
                    <button class="close text-danger" aria-label="Remove" style="font-size: 14px;" v-on:click="remove(item)">
                        <i class="icon-trash"></i>
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot class="detur-details" v-if="showProceed">
            <tr>
                <td colspan="3">Subtotal</td>
                <td class="text-center">{{ subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3" class="bt-none">Service Fees</td>
                <td class="bt-none text-center">{{ serviceFees }}</td>
            </tr>
            <tr class="detur-summary">
                <td colspan="3">TOTAL</td>
                <td class="text-center">{{ total }}</td>
            </tr>
            </tfoot>
        </table>
        <div class="alert alert-warning" role="alert" v-if="!showProceed">
            <i class="wb-warning"></i> Please add at least one hotel to your package!
        </div>
        <a href="#" class="btn_full" v-if="showProceed" v-on:click="proceedToCheckOut">Proceed to Checkout</a>
    </aside>
</template>

<script>
    export default {
        data: function () {
            return {
                items: [],
                subtotal: 0,
                total: 0,
                serviceFees: 0,
                hotelCount: 0,
                ticketCount: 0,
                showProceed: false,
                loadingEffect: false
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
                if (this.hotelCount > 0) {
                    this.showProceed = true;
                }
                this.calculateCart();
            },
            remove: function (item) {

                let found = false;
                for(let i = 0; i < this.items.length; i++) {
                    if (this.items[i].reference === item.reference) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    this.items.splice(this.items.indexOf(item), 1);

                    if (item.type === 'seat') {
                        this.ticketCount -= 1;
                    } else {
                        this.hotelCount -= 1;
                    }
                    EventBus.$emit('item-removed', item);
                    this.calculateCart();
                }
            },
            getCart: function () {
                let cart = $('meta[name="cart"]').attr('content');

                axios.get('/cart/' + cart)
                    .then(response => {
                        if (response.data.items !== null) {
                            this.serviceFees = response.data.serviceFees;
                            this.total = response.data.total;
                            this.subtotal = response.data.subtotal;
                            this.items = response.data.items;
                            this.calculateCart();
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            calculateCart: function () {
                this.loadingEffect = true;

                axios({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',
                    url: '/calculate',
                    data: {
                        items: this.items
                    }
                })
                    .then(response => {
                        this.serviceFees = response.data.serviceFees;
                        this.total = response.data.total;
                        this.subtotal = response.data.subtotal;

                        for (let item in this.items) {
                            if (this.items[item].type === "hotel") {
                                this.hotelCount += 1;
                            }
                        }

                        if (this.hotelCount < 1) {
                            this.showProceed = false;
                        } else {
                            this.showProceed = true;
                        }

                        this.loadingEffect = false;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            proceedToCheckOut: function () {
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
                        if (response.status === 200) {
                            window.location.replace('/cart/extras')
                        }
                    })
                    .catch(error => {
                        swal('Problem occured!', error, 'error');
                    })
            }
        },
        mounted() {
            this.getCart();
            EventBus.$on('item-added', (item) => this.add(item));
            EventBus.$on('item-removed', (item) => this.remove(item));
        }
    }
</script>

<style scoped>
    .displayBlock {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        text-align: center;
        padding: 25%;
        margin: 0 auto;
        vertical-align: middle;
    }
    .displayNone {
        display: none;
    }
    #sidebar {
        position: relative;
    }
    .package {
        background-color: rgba(44,62,80,1);
        color: #fff;
        -webkit-border-top-left-radius: 3px;
        text-align: center;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        margin: 5px;
        font-size: 18px;
    }
</style>