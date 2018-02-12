<template>
    <div class="strip_all_tour_list">
        <div class="row" v-for="hotel in hotels">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="img_list back-black">
                    <a href="#" data-toggle="modal" :data-target="'#' + hotel.reference + 'G'">
                        <img :src="hotel.photos[0].thumbnail_path" class="img-responsive" alt="">
                        <i class="icon-camera-6"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="tour_list_desc">
                    <h3 class="text-dot">
                        <strong>{{ hotel.name }}</strong>
                    </h3>
                    <div class="rating">
                        <img :src="'/frontend/img/stars/' + hotel.stars + '.png'" alt="">
                    </div>
                    <p class="hotel-list-info">{{ hotel.description.slice(0, 180) }}...</p>
                    <a href data-toggle="modal" :data-target="'#' + hotel.reference + 'M'" class="show-map w100 p0 relative font-600">
                        <i class="icon-location-2 font-14 fl color-blue p0"></i>
                        Show Hotel On Map
                    </a>
                    <div class="mt15">
                        <a href="#" class="otherprice color-black capitalize">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 pr0">
                <div class="price_list">
                    <div class="p0">
                        <ul>
                            <li class="room-price pl10 pr10">
                                <h6 class="board font-11 text-dot">{{ hotel.city }}</h6>

                                <small>Based on {{ hotel.review_count }} reviews<span class="font-10 color-gray"><br></span></small>
                                <h4> {{ hotel.review_point }}<span class="font-16 color-black">/10</span></h4>
                            </li>
                            <li class="price-btn">
                                <button type="button" data-toggle="collapse" :data-target="'#' + hotel.reference + 'R'" aria-expanded="false"
                                        :aria-controls="hotel.reference + 'Rooms'" style="min-width: 145px;" class="btn_1 green radius-50">ROOM OPTIONS</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="collapse pt-30" :id="hotel.reference + 'R'">
                    <div class="other-price-wrap" v-for="room in hotel.rooms">
                        <div class="room-type col fl ">
                            <div class="w100 p0 font-bold text-dot t-uppercase">{{ room.room_type }} room</div>
                            <p class="font-10 color-red font-bold">No Cancellation</p>
                        </div>

                        <div class="accordion-type fl col">
                            <div>Bed & Breakfast</div>
                            <span class="radius-50 font-11 font-bold color-orange ng-scope" style="padding: 2px 15px">Non Refundable</span>
                        </div>

                        <div class="total-price fl col">
                            <div class="w100 p0">
                                3 Nights Stay
                            </div>
                        </div>

                        <div class="add-to-cart col fl">
                            <a class="w48 btn_1 blue radius-50 font-600 medium mt3" v-on:click="addToCart(room)">ADD TO PACKAGE</a>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                hotels: []
            }
        },
        methods: {
            addToCart: function (room) {
                let item = {
                    'reference': room.reference,
                    'type': room.type,
                    'name': room.name
                };

                app.__vue__.$refs.cart.add(item);
            }
        },
        mounted() {
            axios.get('/hotel-list')
                .then(response => {
                    this.hotels = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
</script>

<style scoped>

</style>