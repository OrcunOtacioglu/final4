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
                            <table class="table table-light">
                                <thead>
                                <tr>
                                    <th>Ticket name</th>
                                    <th>Availability</th>
                                    <th>Cost</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- New Rate Area -->
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rate" id="rate" placeholder="e.g. General Admission">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="e.g. 100">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="price" id="price" placeholder="Cost">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-toolbar" aria-label="Toolbar with button groups" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-icon btn-pure btn-success">
                                                    <i class="icon ti-save" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-primary" data-toggle="collapse" data-target="#advancedSetup" aria-expanded="false" aria-controls="advancedRateSetup">
                                                    <i class="icon ti-settings" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-danger">
                                                    <i class="icon ti-trash color-red" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="collapse" id="advancedSetup">
                                            <div class="card card-default">
                                                <div class="card-block">
                                                    <p>
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson
                                                        ad squid. Nihil anim keffiyeh helvetica, craft beer labore
                                                        wes anderson cred nesciunt sapiente ea proident.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- End New Rate Area -->

                                <!-- Rates List -->
                                <tr v-for="rate in rates">
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rate" :id="rate.reference + 'rate'" placeholder="e.g. General Admission">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="qty" :id="rate.reference + 'qty'">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="price" :id="rate.reference + 'price'" placeholder="Cost">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-toolbar" aria-label="Toolbar with button groups" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-icon btn-pure btn-success">
                                                    <i class="icon ti-save" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-primary" data-toggle="collapse" :data-target="'#' + rate.reference + 'advancedSetup'" aria-expanded="false" aria-controls="advancedRateSetup">
                                                    <i class="icon ti-settings" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-pure btn-danger">
                                                    <i class="icon ti-trash color-red" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="collapse" :id="rate.reference + 'advancedSetup'">
                                            <div class="card card-default">
                                                <div class="card-block">
                                                    <p>
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson
                                                        ad squid. Nihil anim keffiyeh helvetica, craft beer labore
                                                        wes anderson cred nesciunt sapiente ea proident.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- End Rates List -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="refund_policy">Set a refund policy</label>
                                <select name="refund_policy" id="refund_policy" class="form-control">
                                    <option value="1">Refunds available until 1 day before the event</option>
                                    <option value="2">Refunds available until 2 days before the event</option>
                                    <option value="3">Refunds available until 3 days before the event</option>
                                    <option value="7">Refunds available until 7 days before the event</option>
                                    <option value="30">Refunds available until 30 days before the event</option>
                                    <option value="60">Refunds available until 60 days before the event</option>
                                    <option value="90">Refunds available until 90 days before the event</option>
                                    <option value="0">No refunds at any time</option>
                                </select>
                            </div>
                            <p class="text-muted">If your refund policy is changed after tickets have been sold, the new policy will apply to future orders only.</p>
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