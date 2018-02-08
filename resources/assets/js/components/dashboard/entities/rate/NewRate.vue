<template>
    <div>
        <!-- New Rate Area -->
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <input type="text" class="form-control" name="rate" id="rate" placeholder="e.g. General Admission">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="e.g. 100">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost">
                </div>
            </div>
            <div class="col-md-3">
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
            </div>
        </div>
        <div class="row advanced-rate-setup">
            <div class="col-md-12">
                <div class="collapse" id="advancedSetup">
                    <div class="card card-default custom-card">
                        <div class="card-block" style="padding: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="color_code">Color code</label>
                                        <input type="text" name="color_code" id="color_code" class="form-control" placeholder="e.g. e7983b">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="profit_margin">Profit margin</label>
                                        <input type="text" name="profit_margin" id="profit_margin" class="form-control" placeholder="e.g. 50%">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Face value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom-header" for="available_online">Available online?</label>
                                        <select name="available_online" id="available_online" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom-header" for="available_box_office">Available online?</label>
                                        <select name="available_box_office" id="available_box_office" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="fee_percentage">Fee percentage</label>
                                        <input type="text" name="fee_percentage" id="fee_percentage" class="form-control" placeholder="e.g. 5%">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="comission_percentage">Comission percentage</label>
                                        <input type="text" name="comission_percentage" id="comission_percentage" class="form-control" placeholder="e.g. 5%">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="custom-header" for="tax_percentage">Tax percentage</label>
                                        <input type="text" name="tax_percentage" id="tax_percentage" class="form-control" placeholder="e.g. 18%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End New Rate Area -->
    </div>
</template>

<script>
    export default {
        name: "new-rate"
    }
</script>

<style scoped>

</style>