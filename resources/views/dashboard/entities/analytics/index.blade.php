@extends('dashboard.base')

@section('title', 'General Analytics')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/asPieProgress.min.css') }}">
    <style>
        #app {
            background: #fff;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card p-30 flex-row justify-content-between">
                <div class="white">
                    <i class="icon icon-circle icon-2x ti-package bg-teal-600" aria-hidden="true"></i>
                </div>
                <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $analytics['financial_info']['gross_sales'] }}</span>
                        <span class="counter-number-related text-capitalize">€</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">gross sales</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-30 flex-row justify-content-between">
                <div class="white">
                    <i class="icon icon-circle icon-2x ti-ticket bg-orange-600" aria-hidden="true"></i>
                </div>
                <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $analytics['financial_info']['offline_sales'] }}</span>
                        <span class="counter-number-related text-capitalize">€</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">offline sales</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-30 flex-row justify-content-between">
                <div class="white">
                    <i class="icon icon-circle icon-2x ti-world bg-cyan-600" aria-hidden="true"></i>
                </div>
                <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $analytics['financial_info']['online_sales'] }}</span>
                        <span class="counter-number-related text-capitalize">€</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">online sales</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Breakdown</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-block p-30">
                                <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-minus-circle text-danger" aria-hidden="true"></i></div>
                                <div class="counter counter-md text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number">{{ $analytics['financial_info']['total_cost'] }}</span>
                                        <span class="counter-number-related text-capitalize">€</span>
                                    </div>
                                    <div class="counter-label text-capitalize">total cost</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-block p-30">
                                <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-plus-circle text-success" aria-hidden="true"></i></div>
                                <div class="counter counter-md text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number">{{ $analytics['financial_info']['net_income'] }}</span>
                                        <span class="counter-number-related text-capitalize">€</span>
                                    </div>
                                    <div class="counter-label text-capitalize">net income</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Breakdown</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#89bceb" data-size="60" data-barsize="10"
                                 data-goal="{{ round($analytics['general_info']['total_sold_ticket_count'] / $analytics['general_info']['total_ticket_count'] * 100, 2) }}"
                                 aria-valuenow="{{ round($analytics['general_info']['total_sold_ticket_count'] / $analytics['general_info']['total_ticket_count'] * 100, 2) }}" role="progressbar">
                                <div class="pie-progress-number">{{ round($analytics['general_info']['total_sold_ticket_count'] / $analytics['general_info']['total_ticket_count'] * 100, 2) }}%</div>
                                <div class="pie-progress-label">{{ $analytics['general_info']['total_sold_ticket_count'] }} Tickets Sold</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#f7e083" data-size="60" data-barsize="10"
                                 data-goal="{{ round($analytics['general_info']['extra_breakdown']['hotels']['general_info']['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['general_info']['starting'] * 100, 2) }}"
                                 aria-valuenow="{{ round($analytics['general_info']['extra_breakdown']['hotels']['general_info']['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['general_info']['starting'] * 100, 2) }}" role="progressbar">
                                <div class="pie-progress-number">{{ round($analytics['general_info']['extra_breakdown']['hotels']['general_info']['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['general_info']['starting'] * 100, 2) }}%</div>
                                <div class="pie-progress-label">{{ $analytics['general_info']['extra_breakdown']['hotels']['general_info']['sold'] }} Rooms Sold</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Category Breakdown</h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-1"></div>
                        @for($i = 0; $i < 3; $i++)
                            <div class="col-md-2">
                                <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#{{ $analytics['general_info']['category_breakdown'][$i]['color_code'] }}" data-size="60" data-barsize="4"
                                     data-goal="{{ $analytics['general_info']['category_breakdown'][$i]['sold'] / $analytics['general_info']['category_breakdown'][$i]['starting'] * 100 }}"
                                     aria-valuenow="{{ $analytics['general_info']['category_breakdown'][$i]['sold'] / $analytics['general_info']['category_breakdown'][$i]['starting'] * 100 }}" role="progressbar">
                                    <div class="pie-progress-number">{{ $analytics['general_info']['category_breakdown'][$i]['sold'] . '/' . $analytics['general_info']['category_breakdown'][$i]['starting'] }}</div>
                                    <div class="pie-progress-label">{{ $analytics['general_info']['category_breakdown'][$i]['name'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        @endfor
                    </div>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-1"></div>
                        @for($i = 3; $i < 6; $i++)
                            <div class="col-md-2">
                                <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#{{ $analytics['general_info']['category_breakdown'][$i]['color_code'] }}" data-size="60" data-barsize="4"
                                     data-goal="{{ $analytics['general_info']['category_breakdown'][$i]['sold'] / $analytics['general_info']['category_breakdown'][$i]['starting'] * 100 }}"
                                     aria-valuenow="{{ $analytics['general_info']['category_breakdown'][$i]['sold'] / $analytics['general_info']['category_breakdown'][$i]['starting'] * 100 }}" role="progressbar">
                                    <div class="pie-progress-number">{{ $analytics['general_info']['category_breakdown'][$i]['sold'] . '/' . $analytics['general_info']['category_breakdown'][$i]['starting'] }}</div>
                                    <div class="pie-progress-label">{{ $analytics['general_info']['category_breakdown'][$i]['name'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Hotels Breakdown</h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-1"></div>
                        @for($i = 0; $i < 3; $i++)
                            <div class="col-md-2">
                                <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#57C7D4" data-size="60" data-barsize="4"
                                     data-goal="{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] * 100 }}"
                                     aria-valuenow="{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] * 100 }}" role="progressbar">
                                    <div class="pie-progress-number">{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] . '/' . $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] }}</div>
                                    <div class="pie-progress-label" style="font-size: 10px;">{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['name'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        @endfor
                    </div>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-1"></div>
                        @for($i = 3; $i < 6; $i++)
                            <div class="col-md-2">
                                <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#57C7D4" data-size="60" data-barsize="4"
                                     data-goal="{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] * 100 }}"
                                     aria-valuenow="{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] / $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] * 100 }}" role="progressbar">
                                    <div class="pie-progress-number">{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['sold'] . '/' . $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['total'] }}</div>
                                    <div class="pie-progress-label" style="font-size: 10px;">{{ $analytics['general_info']['extra_breakdown']['hotels']['hotels_breakdown'][$i]['name'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Pending Bookings</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Booking Reference</th>
                            <th>Details</th>
                            <th>Cost</th>
                            <th>Offer</th>
                            <th>Income</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <p>75k04f</p>
                            </td>
                            <td>
                                <p>2 X Platinum Hospitality</p>
                            </td>
                            <td>
                                <p>7.054€</p>
                            </td>
                            <td>
                                <p>9.060€</p>
                            </td>
                            <td>
                                <p class="text-success">2.006€</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/dashboard/plugins/jquery-asPieProgress.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/plugins/aspieprogress.min.js') }}"></script>
@stop