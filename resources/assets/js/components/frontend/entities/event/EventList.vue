<template>
    <div class="row">
        <div class="col-sm-12 col-lg-12" v-for="event in events">
            <div class="content-box widget-general relative t-center">
                <div class="widget-overlay transtation"></div>
                <img v-bind:src="event.cover_photo" class="w100 p0">
                <div class="text-container t-center">
                    <a v-bind:href="event.url">
                        <h2 class="header text-shadow transtation">
                            <strong></strong> {{ event.name }}
                        </h2>
                    </a>
                    <div class="group-btn w100 p0">
                        <div class="seperator mt0 mb30"
                             style="border-bottom: 1px solid rgba(255,255,255,0.4);"></div>
                        <ul>
                            <li class="">
                                <a v-bind:href="event.url" class="transtation"></a>
                                <p class="m0 font-11">Buy Tickets</p>
                            </li>
                        </ul>
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
                events: []
            }
        },
        mounted() {
            axios.get('/event')
                .then(response => {
                    this.events = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
</script>

<style scoped>

</style>