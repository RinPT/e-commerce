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
                                <h4 class="title">Support Questions</h4>
                                <div class="info">
                                    <strong class="amount">1281</strong>
                                    <span class="text-primary">(14 unread)</span>
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
                                <h4 class="title">Support Questions</h4>
                                <div class="info">
                                    <strong class="amount">1281</strong>
                                    <span class="text-primary">(14 unread)</span>
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
                                <h4 class="title">Support Questions</h4>
                                <div class="info">
                                    <strong class="amount">1281</strong>
                                    <span class="text-primary">(14 unread)</span>
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
                                <h4 class="title">Support Questions</h4>
                                <div class="info">
                                    <strong class="amount">1281</strong>
                                    <span class="text-primary">(14 unread)</span>
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
    </div>
    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Basic Chart</h2>
                    <p class="card-subtitle"></p>
                </header>
                <div class="card-body">

                    <!-- Flot: Basic -->
                    <div class="chart chart-md" id="flotBasic"></div>
                    <script type="text/javascript">

                        var flotBasicData = [{
                            data: [
                                [0, 170],
                                [1, 169],
                                [2, 173],
                                [3, 188],
                                [4, 147],
                                [5, 113],
                                [6, 128],
                                [7, 169],
                                [8, 173],
                                [9, 128],
                                [10, 128]
                            ],
                            label: "Series 1",
                            color: "#0088cc"
                        }, {
                            data: [
                                [0, 115],
                                [1, 124],
                                [2, 114],
                                [3, 121],
                                [4, 115],
                                [5, 83],
                                [6, 102],
                                [7, 148],
                                [8, 147],
                                [9, 103],
                                [10, 113]
                            ],
                            label: "Series 2",
                            color: "#2baab1"
                        }, {
                            data: [
                                [0, 70],
                                [1, 69],
                                [2, 73],
                                [3, 88],
                                [4, 47],
                                [5, 13],
                                [6, 28],
                                [7, 69],
                                [8, 73],
                                [9, 28],
                                [10, 28]
                            ],
                            label: "Series 3",
                            color: "#734ba9"
                        }];

                        // See: js/examples/examples.charts.js for more settings.

                    </script>

                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">

                    <h2 class="card-title">Pie Chart</h2>
                    <p class="card-subtitle"></p>
                </header>
                <div class="card-body">

                    <!-- Flot: Pie -->
                    <div class="chart chart-md" id="flotPie"></div>
                    <script type="text/javascript">

                        var flotPieData = [{
                            label: "Series 1",
                            data: [
                                [1, 60]
                            ],
                            color: '#0088cc'
                        }, {
                            label: "Series 2",
                            data: [
                                [1, 10]
                            ],
                            color: '#2baab1'
                        }, {
                            label: "Series 3",
                            data: [
                                [1, 15]
                            ],
                            color: '#734ba9'
                        }, {
                            label: "Series 4",
                            data: [
                                [1, 15]
                            ],
                            color: '#E36159'
                        }];

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
    <script src="/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.js"></script>
    <script src="/admin/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.pie.js"></script>
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
    <script src="/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.js"></script>
    <script src="/admin/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.pie.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.categories.js"></script>
    <script src="/admin/vendor/flot/jquery.flot.resize.js"></script>
    <script src="/admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="/admin/vendor/raphael/raphael.js"></script>
    <script src="/admin/vendor/morris/morris.js"></script>
    <script src="/admin/vendor/owl.carousel/owl.carousel.js"></script>
@endsection
