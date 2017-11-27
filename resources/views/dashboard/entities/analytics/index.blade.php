@extends('dashboard.base')

@section('title', 'General Analytics')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/asPieProgress.min.css') }}">
@stop

@section('page-header')
    <a href="javascript:void(0)" onclick="printData()" class="btn btn-secondary">Print Data</a>
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
                        <span class="counter-number">39.066,81</span>
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
                        <span class="counter-number">26.000</span>
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
                        <span class="counter-number">13.066,81</span>
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
                                        <span class="counter-number">26.530</span>
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
                                        <span class="counter-number">12.536,81</span>
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
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#89bceb" data-size="60" data-barsize="10" data-goal="6.8" aria-valuenow="6.8" role="progressbar">
                                <div class="pie-progress-number">6.8%</div>
                                <div class="pie-progress-label">30 Tickets Sold</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#f7e083" data-size="60" data-barsize="10" data-goal="27.6" aria-valuenow="27.6" role="progressbar">
                                <div class="pie-progress-number">27.6%</div>
                                <div class="pie-progress-label">29 Rooms Sold</div>
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
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#57C7D4" data-size="60" data-barsize="4" data-goal="0" aria-valuenow="0" role="progressbar">
                                <div class="pie-progress-number">0</div>
                                <div class="pie-progress-label">Platinum Hospitality</div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#e7983b" data-size="60" data-barsize="4" data-goal="0" aria-valuenow="0" role="progressbar">
                                <div class="pie-progress-number">0</div>
                                <div class="pie-progress-label">Gold Hospitality</div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#f04f51" data-size="60" data-barsize="4" data-goal="9.3" aria-valuenow="9.3" role="progressbar">
                                <div class="pie-progress-number">28</div>
                                <div class="pie-progress-label">Central Lower Bowl</div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#57C7D4" data-size="60" data-barsize="4" data-goal="0" aria-valuenow="0" role="progressbar">
                                <div class="pie-progress-number">0</div>
                                <div class="pie-progress-label">Central Upper Bowl</div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#af5ac1" data-size="60" data-barsize="4" data-goal="10.5" aria-valuenow="10.5" role="progressbar">
                                <div class="pie-progress-number">2</div>
                                <div class="pie-progress-label">Baseline Lower Bowl</div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="pie-progress" data-plugin="pieProgress" data-barcolor="#e7983b" data-size="60" data-barsize="4" data-goal="0" aria-valuenow="0" role="progressbar">
                                <div class="pie-progress-number">0</div>
                                <div class="pie-progress-label">Baseline Upper Bowl</div>
                            </div>
                        </div>
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
                                <p>gTnMu6</p>
                            </td>
                            <td>
                                <p>12 X Baseline Lower Bowl</p>
                                <p>6 X Hotel Prag (Double Use)</p>
                            </td>
                            <td>
                                <p>5.946€</p>
                            </td>
                            <td>
                                <p>10.250€</p>
                            </td>
                            <td>
                                <p class="text-success">4.303€</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>fDQA90</p>
                            </td>
                            <td>
                                <p>4 X Central Lower Bowl</p>
                                <p>4 X Central Upper Bowl</p>
                                <p>4 X Baseline Upper Bowl</p>
                            </td>
                            <td>
                                <p>4.584€</p>
                            </td>
                            <td>
                                <p>6.500€</p>
                            </td>
                            <td>
                                <p class="text-success">1.916€</p>
                            </td>
                        </tr>
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
    <script>
        function printData() {
            var prtContent = document.getElementById("page");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
@stop