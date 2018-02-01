<template>
    <!-- Basic Information Setup -->
    <div class="row">

        <!-- Basic Info -->
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
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" v-model="name" placeholder="Make it a short and catchy title">
                            </div>
                            <!-- End Event Name -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control" v-model="subtitle" placeholder="e.g. Weekend Pass">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Event Description -->
                            <div class="form-group">
                                <label for="description" class="mb-0">Description</label>
                                <span class="text-help m-0">This description will appear on the event listing page.</span>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" v-model="description"></textarea>
                            </div>
                            <!-- End Event Description -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contact" class="mb-0">Contact details</label>
                                <span class="text-help m-0">Your contact information is kept private and shown only to attendees who book a ticket.</span>
                                <input type="text" class="form-control" name="contact" id="contact" v-model="contact" placeholder="Enter an email address or phone number">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Event Category -->
                            <div class="form-group">
                                <label for="category">Add a category</label>
                                <select name="category" id="category" v-model="category" class="form-control">
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
                                <label for="listing">Who can see the event?</label>
                                <select name="listing" id="listing" v-model="listing" class="form-control">
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
        <!-- End Basic Info -->

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
                                Next Step <i class="icon ti-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End confirmation -->

    </div>
    <!-- End Basic Information Setup -->
</template>

<script>
    export default {
        data: function () {
            return {
                options: [],
                name: '',
                subtitle: '',
                description: '',
                contact: '',
                category: '',
                listing: ''
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
            sendEventData: function () {
                axios.post('/dashboard/event', {
                    name: this.name,
                    subtitle: this.subtitle,
                    description: this.description,
                    contact: this.contact,
                    category: this.category,
                    listing: this.listing
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
                                location.href = ('/dashboard/event/' + response.data.id + '/edit#rate-setup');
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
            this.setOptions();
        }
    }
</script>

<style scoped>

</style>