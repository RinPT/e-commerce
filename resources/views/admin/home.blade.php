@extends('layouts.admin.main')

@section('title','Admin Homepage')

@section('custom-styles')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/admin/vendor/morris/morris.css" />
    <link rel="stylesheet" href="/admin/vendor/chartist/chartist.min.css" />

    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/admin/vendor/morris/morris.css" />
    <link rel="stylesheet" href="/admin/vendor/owl.carousel/assets/owl.carousel.css" />
    <link rel="stylesheet" href="/admin/vendor/owl.carousel/assets/owl.theme.default.css" />


@endsection

@section('breadcrumb')
    <h2>Dashboard</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')



    <div class="row">
        <div class="col-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Total User</h4>
                                <div class="info">
                                    <strong class="amount">{{$user->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase">(view all)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Total Store</h4>
                                <div class="info">
                                    <strong class="amount">{{$store->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{route('admin.stores')}}">(view all)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Total Product</h4>
                                <div class="info">
                                    <strong class="amount">{{$product->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{ route('index.products') }}">(view all)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Total Order</h4>
                                <div class="info">
                                    <strong class="amount">{{$order->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{ route('admin.orders') }}">(view all)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Monthly Registered Accounts</h2>
                    <p class="card-subtitle">Monthly new users and new stores</p>
                </header>
                <div class="card-body">

                    <!-- Flot: Basic -->
                    <div class="chart chart-md" id="flotBasic"></div>
                    <script type="text/javascript">

                        var flotBasicData = [{
                            data: [
                                [1, {{DB::table('users')->whereMonth('created_at', '1')->count()}}],
                                [2, {{DB::table('users')->whereMonth('created_at', '2')->count()}}],
                                [3, {{DB::table('users')->whereMonth('created_at', '3')->count()}}],
                                [4, {{DB::table('users')->whereMonth('created_at', '4')->count()}}],
                                [5, {{DB::table('users')->whereMonth('created_at', '5')->count()}}],
                                [6, {{DB::table('users')->whereMonth('created_at', '6')->count()}}],
                                [7, {{DB::table('users')->whereMonth('created_at', '7')->count()}}],
                                [8, {{DB::table('users')->whereMonth('created_at', '8')->count()}}],
                                [9, {{DB::table('users')->whereMonth('created_at', '9')->count()}}],
                                [10, {{DB::table('users')->whereMonth('created_at', '10')->count()}}],
                                [11, {{DB::table('users')->whereMonth('created_at', '11')->count()}}],
                                [12, {{DB::table('users')->whereMonth('created_at', '12')->count()}}]
                            ],

                            label: "User",
                            color: "#CCCCCC"
                        }, {
                            data: [
                                [1, {{DB::table('store')->whereMonth('created_at', '1')->count()}}],
                                [2, {{DB::table('store')->whereMonth('created_at', '2')->count()}}],
                                [3, {{DB::table('store')->whereMonth('created_at', '3')->count()}}],
                                [4, {{DB::table('store')->whereMonth('created_at', '4')->count()}}],
                                [5, {{DB::table('store')->whereMonth('created_at', '5')->count()}}],
                                [6, {{DB::table('store')->whereMonth('created_at', '6')->count()}}],
                                [7, {{DB::table('store')->whereMonth('created_at', '7')->count()}}],
                                [8, {{DB::table('store')->whereMonth('created_at', '8')->count()}}],
                                [9, {{DB::table('store')->whereMonth('created_at', '9')->count()}}],
                                [10, {{DB::table('store')->whereMonth('created_at', '10')->count()}}],
                                [11, {{DB::table('store')->whereMonth('created_at', '11')->count()}}],
                                [12, {{DB::table('store')->whereMonth('created_at', '12')->count()}}]
                            ],
                            label: "Store",
                            color: "#2baab1"
                        }];

                        // See: js/examples/examples.charts.js for more settings.

                    </script>

                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Line Chart: With Tooltips</h2>
                </header>
                <div class="card-body">
                    <div id="ChartistLineChartWithTooltips" class="ct-chart ct-perfect-fourth ct-golden-section">

                        <script type="text/javascript">
                                new Chartist.Line('#ChartistLineChartWithTooltips', {
                                    labels: ['1', '2', '3', '4', '5', '6','7','8','9','10','11','12'],
                                    series: [{
                                        name: 'Monthly orders',
                                        data: [ {{
                                        DB::table('orders')->whereMonth('created_at', '1')->count(),
                                        DB::table('orders')->whereMonth('created_at', '2')->count(),
                                        DB::table('orders')->whereMonth('created_at', '3')->count(),
                                        DB::table('orders')->whereMonth('created_at', '4')->count(),
                                        DB::table('orders')->whereMonth('created_at', '5')->count(),
                                        DB::table('orders')->whereMonth('created_at', '6')->count(),
                                        DB::table('orders')->whereMonth('created_at', '7')->count(),
                                        DB::table('orders')->whereMonth('created_at', '8')->count(),
                                        DB::table('orders')->whereMonth('created_at', '9')->count(),
                                        DB::table('orders')->whereMonth('created_at', '10')->count(),
                                        DB::table('orders')->whereMonth('created_at', '11')->count(),
                                        DB::table('orders')->whereMonth('created_at', '12')->count()
                                        }}
                                        ]
                                    }]
                                });

                                var $chart = $('#ChartistLineChartWithTooltips');

                                var $toolTip = $chart
                                    .append('<div class="tooltip"></div>')
                                    .find('.tooltip')
                                    .hide();

                                $chart.on('mouseenter', '.ct-point', function() {
                                    var $point = $(this),
                                        value = $point.attr('ct:value'),
                                        seriesName = $point.parent().attr('ct:series-name');
                                    $toolTip.html(seriesName + '<br>' + value).show();
                                });

                                $chart.on('mouseleave', '.ct-point', function() {
                                    $toolTip.hide();
                                });

                                $chart.on('mousemove', function(event) {
                                    $toolTip.css({
                                        left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
                                        top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
                                    });
                                });
                        </script>

                    </div>



                    <!-- See: js/examples/examples.charts.js for the example code. -->
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Order</h2>
                    <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p>
                </header>
                <div class="card-body">

                    <!-- Morris: Bar -->
                    <div class="chart chart-md" id="morrisBar"></div>
                    <script type="text/javascript">

                        var morrisBarData = [{

                            @foreach($yearlyOrders as $yearlyOrder)
                            y: '{{$yearlyOrder}}',
                            a: {{DB::table('orders')->whereMonth('created_at', '$yearlyOrder')->count()}}
                        },
                        @endforeach];

                        // See: js/examples/examples.charts.js for more settings.

                    </script>

                </div>
            </section>
        </div>
    </div>
@endsection

@section('custom-scripts')

    <!-- Specific Page Vendor -->
    <script src="/admin/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.js"></script>
    <script src="/admin/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.categories.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.resize.js"></script>
    <script src="/admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="/admin/vendor/raphael/raphael.js"></script>
    <script src="/admin/vendor/morris/morris.js"></script>
    <script src="/admin/vendor/gauge/gauge.js"></script>
    <script src="/admin/vendor/snap.svg/snap.svg.js"></script>
    <script src="/admin/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="/admin/vendor/chartist/chartist.js"></script>



    <!-- Examples -->
    <style>
        #ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
            fill: none;
            stroke-width: 4px;
            stroke-dasharray: 5px;
            -webkit-animation: dashoffset 1s linear infinite;
            -moz-animation: dashoffset 1s linear infinite;
            animation: dashoffset 1s linear infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
            -webkit-animation: bouncing-stroke 0.5s ease infinite;
            -moz-animation: bouncing-stroke 0.5s ease infinite;
            animation: bouncing-stroke 0.5s ease infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
            fill: none;
            stroke-width: 3px;
        }

        #ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
            -webkit-animation: exploding-stroke 1s ease-out infinite;
            -moz-animation: exploding-stroke 1s ease-out infinite;
            animation: exploding-stroke 1s ease-out infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
            fill: none;
            stroke-width: 2px;
            stroke-dasharray: 40px 3px;
        }

        @-webkit-keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            };
        }

        @-moz-keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            };
        }

        @keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            };
        }

        @-webkit-keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            };
        }

        @-moz-keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            };
        }

        @keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            };
        }

        @-webkit-keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            };
        }

        @-moz-keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            };
        }

        @keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            };
        }
    </style>

    <script src="/admin/js/examples/examples.charts.js"></script>


    <script src="/admin/vendor/jquery-ui/jquery-ui.js"></script>
    <script src="/admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="/admin/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.js"></script>
    <script src="/admin/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.categories.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.resize.js"></script>
    <script src="/admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="/admin/vendor/raphael/raphael.js"></script>
    <script src="/admin/vendor/morris/morris.js"></script>
    <script src="/admin/vendor/owl.carousel/owl.carousel.js"></script>
    <script src="/admin/js/examples/examples.charts.js"></script>


@endsection
