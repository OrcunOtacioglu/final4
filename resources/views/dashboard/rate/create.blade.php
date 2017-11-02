@extends('dashboard.base')

@section('title', 'Create Rate')

@section('content')
    <form action="{{ action('RateController@store') }}" method="POST">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="color_code">Color Code</label>
                    <input type="text" name="color_code" id="color_code" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="text" name="cost" id="cost" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="profit_margin">Profit Margin</label>
                    <input type="text" name="profit_margin" id="profit_margin" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="minimum_profit_amount">Minimum Profit Amount</label>
                    <input type="text" name="minimum_profit_amount" id="minimum_profit_amount" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="available">Total Available</label>
                    <input type="text" name="available" id="available" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="available_online">Available Online</label>
                    <select name="available_online" id="available_online" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="available_box_office">Available Box Office</label>
                    <select name="available_box_office" id="available_box_office" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="online_fee">Online Fee</label>
                    <input type="text" name="online_fee" id="online_fee" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="box_office_fee">Box Office Fee</label>
                    <input type="text" name="box_office_fee" id="box_office_fee" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="online_comission">Online Comission</label>
                    <input type="text" name="online_comission" id="online_comission" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="box_office_comission">Box Office Comission</label>
                    <input type="text" name="box_office_comission" id="box_office_comission" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tax_percentage">Tax Percentage</label>
                    <input type="text" name="tax_percentage" id="tax_percentage" class="form-control">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="zones">Zones</label>
                    <input type="text" name="zones" id="zones" class="form-control">
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-success" value="Create">
        <a href="{{ action('RateController@index') }}" class="text-muted">Cancel</a>
    </form>
@stop