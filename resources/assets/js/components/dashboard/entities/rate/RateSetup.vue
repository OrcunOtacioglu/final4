<template>
    <!-- Rate Setup -->
    <div class="row" id="rate-setup">
        <div class="col-md-12">
            <div class="panel panel-primary panel-line dashboard-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">What tickets will be available?</h3>
                </div>
                <div class="alert alert-info alert-dismissible" role="alert" v-if="rates.length < 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    There are no rates yet!
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="border-bottom: 1px solid #E2E5E7; margin-bottom: 10px;">
                                <div class="col-md-5">
                                    <p class="custom-header required">Ticket name</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="custom-header">Availability</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="custom-header">Cost</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="custom-header">Actions</p>
                                </div>
                            </div>
                            <new-rate></new-rate>
                            <div v-for="rate in rates">
                                <!-- Single Rate Area -->
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rate" id="rate" placeholder="e.g. General Admission" v-model="rate.name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="e.g. 100" v-model="rate.available">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" v-model="rate.cost">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="btn-toolbar" aria-label="Toolbar with button groups" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-icon btn-pure btn-success">
                                                    <i class="icon ti-save" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-primary" data-toggle="collapse" :data-target="'#' + rate.reference" aria-expanded="false" aria-controls="advancedRateSetup">
                                                    <i class="icon ti-settings" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-danger">
                                                    <i class="icon ti-trash color-red" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row advanced-rate-setup">
                                    <div class="col-md-12">
                                        <div class="collapse" :id="rate.reference">
                                            <div class="card card-default custom-card">
                                                <div class="card-block" style="padding: 0;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="color_code">Color code</label>
                                                                <input type="text" name="color_code" id="color_code" class="form-control" v-model="rate.color_code">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="profit_margin">Profit margin</label>
                                                                <input type="text" name="profit_margin" id="profit_margin" class="form-control" v-model="rate.profit_margin">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="price">Price</label>
                                                                <input type="text" name="price" id="price" class="form-control" v-model="rate.price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="available_online">Available online?</label>
                                                                <select name="available_online" id="available_online" class="form-control" v-model="rate.available_online">
                                                                    <option value="false">No</option>
                                                                    <option value="true">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="available_box_office">Available box office?</label>
                                                                <select name="available_box_office" id="available_box_office" class="form-control" v-model="rate.available_box_office">
                                                                    <option value="false">No</option>
                                                                    <option value="true">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="fee_percentage">Fee percentage</label>
                                                                <input type="text" name="fee_percentage" id="fee_percentage" class="form-control" v-model="rate.fee_percentage">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="comission_percentage">Comission percentage</label>
                                                                <input type="text" name="comission_percentage" id="comission_percentage" class="form-control" v-model="rate.comission_percentage">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-header" for="tax_percentage">Tax percentage</label>
                                                                <input type="text" name="tax_percentage" id="tax_percentage" class="form-control" v-model="rate.tax_percentage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Rate Area -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Rate Setup -->
</template>

<script>
    export default {
        data: function () {
            return {
                eventID: $('meta[name=event]').attr("content"),
                rates: []
            }
        },
        methods: {
            getRates: function (eventID) {
                axios.get('/dashboard/event/' + eventID + '/rate')
                    .then(response => {
                        this.rates = response.data;
                    })
                    .catch(error => {
                        swal({
                            title: 'Ooops! Something went wrong!',
                            text: error,
                            icon: 'error',
                            button: true,
                            timer: 3000
                        });
                    })
            }
        },
        mounted() {
            this.getRates(this.eventID)
        }
    }
</script>

<style scoped>

</style>