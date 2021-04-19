@extends('layouts.admin.main')

@section('title','Admin Homepage')

@section('custom-styles')

    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/admin/vendor/morris/morris.css" />

@endsection

@section('breadcrumb')
    <li>
        <a href="{{route('admin.home')}}">
            <i class="bx bx-home-alt"></i>
        </a>
    </li>
    <li><span>Dashboard</span></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 " style="display: -webkit-box;">
            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-expand-alt" style="color: black"></i>
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
                                <a class="text-muted text-uppercase">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-user-circle" style="color: black"></i>
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
                                <a class="text-muted text-uppercase" href="{{route('admin.stores')}}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-grid-alt" style="color: black"></i>
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
                                <a class="text-muted text-uppercase" href="{{ route('index.products') }}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-backpack" style="color: black"></i>
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
                                <a class="text-muted text-uppercase" href="{{ route('admin.orders') }}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-4 " style="display: -webkit-box;">
            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-backpack" style="color: black"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Weekly users</h4>
                                <div class="info">
                                    <strong class="amount">{{DB::table('users')->whereDate('created_at', today()->subDays(7))->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="#">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-backpack" style="color: black"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Weekly stores</h4>
                                <div class="info">
                                    <strong class="amount">{{DB::table('store')->whereDate('created_at', today()->subDays(7))->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{route('admin.stores')}}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-backpack" style="color: black"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Weekly products</h4>
                                <div class="info">
                                    <strong class="amount">{{DB::table('products')->whereDate('created_at', today()->subDays(7))->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{route('index.products')}}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card-featured-left card-featured-primary md">
                <div class="card-body">
                    <div class="widget-summary widget-summary-xlg">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bxs-backpack" style="color: black"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Weekly order</h4>
                                <div class="info">
                                    <strong class="amount">{{DB::table('orders')->whereDate('created_at', today()->subDays(7))->count()}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{ route('admin.orders') }}">(view list)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 " style="display: -webkit-box;">
            <section class="card col">
                <header class="card-header">
                    <h2 class="card-title">Monthly Registered Accounts</h2>
                    <p class="card-subtitle">Monthly new users and new stores</p>
                </header>
                <div class="card-body">

                    <!-- Flot: Basic -->
                    <div class="chart chart-md" id="flotDashBasic"></div>
                    <script>

                        var flotDashBasicData = [{
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

                        // See: js/examples/examples.dashboard.js for more settings.

                    </script>

                </div>
            </section>

            <section class="card col" style="">
                <header class="card-header">
                    <h2 class="card-title">Pie Chart</h2>
                    <p class="card-subtitle">Default Pie Chart</p>
                </header>
                <div class="card-body">

                    <!-- Flot: Pie -->
                    <div class="chart chart-md" id="flotPie"></div>
                    <script type="text/javascript">

                        @foreach($countries as $country)
                        var flotPieData = [{
                            {{--label: "{{$countries->name}}",--}}
                            data: [
                                [1, "{{$countries->count()}}"]
                            ],
                            color: '#0088cc'
                        }];
                        @endforeach

                        // See: js/examples/examples.charts.js for more settings.

                    </script>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('custom-scripts')

    <script src="/admin/vendor/jquery-ui/jquery-ui.js"></script>
    <script src="/admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="/admin/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
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
    <script src="/admin/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="/admin/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="/admin/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

@endsection
