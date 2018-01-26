@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-success panel-line">
                        <div class="panel-heading">
                            <h3 class="panel-title">TOTAL SALES</h3>
                        </div>
                        <div class="panel-body">
                            <p class="text-success font-size-40 mb-0">0.00 EUR</p>
                            <p>30 Days</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-warning panel-line">
                        <div class="panel-heading">
                            <h3 class="panel-title">ORDERS COMPLETED</h3>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning font-size-40 mb-0">0</p>
                            <p>30 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">QUICK LINKS</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a class="list-group-item" href="{{ action('EventController@create') }}">
                            <i class="icon ti-plus"></i>Create New Event
                        </a>
                        <a class="list-group-item" href="javascript:void(0)">
                            <i class="icon ti-ticket"></i>Manage/Edit Events
                        </a>
                        <a class="list-group-item" href="javascript:void(0)">
                            <i class="icon ti-home"></i>Manage/Edit Hotels
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop