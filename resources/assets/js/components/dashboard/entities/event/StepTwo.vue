<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Basic Setup -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary panel-line dashboard-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Information</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Event Name -->
                                    <div class="form-group">
                                        <label class="custom-header required" for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" v-model="event.name" placeholder="Make it a short and catchy title">
                                    </div>
                                    <!-- End Event Name -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom-header" for="subtitle">Subtitle</label>
                                        <input type="text" name="subtitle" id="subtitle" class="form-control" v-model="event.subtitle" placeholder="e.g. Weekend Pass">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Event Description -->
                                    <div class="form-group">
                                        <label class="custom-header required" for="description">Description</label>
                                        <span class="text-help m-0">This description will appear on the event listing page.</span>
                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" v-model="event.description"></textarea>
                                    </div>
                                    <!-- End Event Description -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="custom-header" for="contact">Contact details</label>
                                        <span class="text-help m-0">Your contact information is kept private and shown only to attendees who book a ticket.</span>
                                        <input type="text" class="form-control" name="contact" id="contact" v-model="event.contact" placeholder="Enter an email address or phone number">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Event Category -->
                                    <div class="form-group">
                                        <label class="custom-header" for="category">Add a category</label>
                                        <select name="category" id="category" v-model="event.category" class="form-control">
                                            <option value="">Select category</option>
                                            <option v-for="option in options" :value="option.value">
                                                {{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <!-- End Event Category -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Event Listing -->
                                    <div class="form-group">
                                        <label class="custom-header" for="listing">Who can see the event?</label>
                                        <select name="listing" id="listing" v-model="event.listing" class="form-control">
                                            <option value="">Select listing option</option>
                                            <option value="1">Public</option>
                                            <option value="0">Private</option>
                                        </select>
                                    </div>
                                    <!-- End Event Listing -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Basic Setup -->

            <!-- Rate Setup -->
            <rate-setup></rate-setup>
            <!-- End Rate Setup -->

            <!-- Location Setup -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary panel-line dashboard-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">When and where is the event?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- Event Start Date -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="start_date">Event starts</label>
                                        <div class="input-group">
                                            <input type="text" name="start_date" id="start_date" class="form-control dateTime" v-model="event.start_date">
                                            <div class="input-group-addon">
                                                <i class="icon wb-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Event Start Date -->
                                <!-- Event End Date -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="end_date">Event ends</label>
                                        <div class="input-group">
                                            <input type="text" name="end_date" id="end_date" class="form-control dateTime" v-model="event.end_date">
                                            <div class="input-group-addon">
                                                <i class="icon wb-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Event End Date -->
                                <!-- Event OnSale Date -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="on_sale_date">Sales start</label>
                                        <div class="input-group">
                                            <input type="text" name="on_sale_date" id="on_sale_date" class="form-control dateTime" v-model="event.on_sale_date">
                                            <div class="input-group-addon">
                                                <i class="icon wb-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Event OnSale Date -->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Event Seated or Not -->
                                    <div class="form-group">
                                        <label class="custom-header" for="is_seated">Have seating map?</label>
                                        <select name="is_seated" id="is_seated" class="form-control" v-model="event.is_seated">
                                            <option value="false">No</option>
                                            <option value="true">Yes</option>
                                        </select>
                                    </div>
                                    <!-- End Event Seated or Not -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom-header" for="seat_map_id">Choose seatmap if seated</label>
                                        <select name="seat_map_id" id="seat_map_id" class="form-control" v-model="event.seat_map_id">
                                            <option value="">Choose SeatMap</option>
                                            <option v-for="seatmap in seatmaps" :value="seatmap.id">{{ seatmap.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom-header" for="city">Host city</label>
                                        <input type="text" class="form-control" name="city" id="city" v-model="event.city">
                                    </div>

                                    <div class="form-group">
                                        <label class="custom-header" for="country">Host country</label>
                                        <input type="text" class="form-control" name="country" id="country" v-model="event.country">
                                    </div>

                                    <div class="form-group">
                                        <label class="custom-header" for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" v-model="event.address"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="custom-header" for="longitude">Longitude</label>
                                                <input type="text" class="form-control" name="longitude" id="longitude" v-model="event.longitude">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="custom-header" for="latitude">Latitude</label>
                                                <input type="text" class="form-control" name="latitude" id="latitude" v-model="event.latitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-help">Google maps placeholder</span>
                                    <img src="http://via.placeholder.com/500x330" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Location Setup -->

            <!-- Confirmation -->
            <div class="col-md-12">
                <div class="confirmation-footer">
                    <div class="container">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-9">
                                <p class="text-muted">You can edit these details at any time.</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <button class="btn btn-success" v-on:click="sendEventData()">
                                    Save & Continue <i class="icon ti-angle-double-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Confirmation -->
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                eventID: $('meta[name=event]').attr("content"),
                options: [],
                event: {},
                seatmaps: [],
            }
        },
        methods: {
            setOptions: function () {
                this.options = [
                    { text: 'Business', value: 'business' },
                    { text: 'Comedy', value: 'comedy' },
                    { text: 'Fashion', value: 'fashion' },
                    { text: 'Festival', value: 'festival' },
                    { text: 'Performance', value: 'performance' },
                    { text: 'Tech', value: 'tech' },
                    { text: 'Sports', value: 'sports' }
                ]
            },
            getEvent: function () {
                axios.get('/dashboard/event/' + this.eventID)
                    .then(response => {
                        if (response.status === 200) {
                            this.setEvent(response);
                        }
                    })
                    .catch(error => {
                        swal({
                            title: 'Ooops! Something went wrong!',
                            text: error,
                            icon: 'error',
                            button: true,
                            timer: 3000
                        })
                    })
            },
            setEvent: function (response) {
                this.event = response.data;
            },
            getSeatMaps: function () {
                axios.get('/dashboard/seatmap')
                    .then(response => {
                        this.seatmaps = response.data;
                    })
                    .catch(error => {
                        swal({
                            title: 'Ooops! Something went wrong!',
                            text: error,
                            icon: 'error',
                            button: true,
                            timer: 3000
                        })
                    })
            },
            sendEventData: function () {
                axios.put('/dashboard/event/' + this.eventID, {
                    address: this.event.address,
                    allow_only_ticket_purchase: this.event.allow_only_ticket_purchase,
                    category: this.event.category,
                    category_map_photo: this.event.category_map_photo,
                    city: this.event.city,
                    contact: this.event.contact,
                    country: this.event.country,
                    cover_photo: this.event.cover_photo,
                    description: this.event.description,
                    end_date: this.event.end_date,
                    is_seated: this.event.is_seated,
                    latitude: this.event.latitude,
                    listing: this.event.listing,
                    longitude: this.event.longitude,
                    name: this.event.name,
                    on_sale_date: this.event.on_sale_date,
                    refund_policy: this.event.refund_policy,
                    start_date: this.event.start_date,
                    status: 0,
                    subtitle: this.event.subtitle,
                    timezone: this.event.timezone
                })
                    .then(response => {
                        if (response.status === 201) {
                            swal({
                                title: 'Success',
                                text:'Event created successfully!',
                                icon: 'success',
                                button: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                location.href = ('/dashboard/event/' + response.data.id + 'manage');
                            }, 1500);
                        }
                    })
                    .catch(error => {
                        swal({
                            title: 'Ooops! Something went wrong!',
                            text: error,
                            icon: 'error',
                            button: true,
                            timer: 3000
                        })
                    })
            }
        },
        mounted() {
            this.getEvent();
            this.setOptions();
            this.getSeatMaps();
        }
    }
</script>

<style scoped>

</style>