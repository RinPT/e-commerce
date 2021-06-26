@extends('layouts.admin.main')

@section('title','Admin Homepage')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <style>
        .widget-summary .widget-summary-col {
            vertical-align: middle;
        }
    </style>
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



    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary mb-4">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-users"></i>
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
                                        <a href="{{ route('admin.user.index') }}" class="text-muted text-uppercase">(view all)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary mb-4">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-store"></i>
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
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary mb-4">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-th-large"></i>
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
                                        <a class="text-muted text-uppercase" href="{{ route('admin.products') }}">(view all)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary mb-4">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Pending Orders</h4>
                                        <div class="info">
                                            <strong class="amount">{{$pending_orders_count}}</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase" href="{{ route('admin.order.show_pending') }}">(view all)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Tickets</h4>
                                        <div class="info">
                                            <strong class="amount">{{$ticket_count}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-6">
                    <section class="card card-featured-left card-featured-primary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Daily Orders</h4>
                                        <div class="info">
                                            <strong class="amount">{{$daily_orders_count}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <section class="card">
                        <header class="card-header">
                            <h2 class="card-title">Daily Sales</h2>
                            <p class="card-subtitle">This table is the total income of the orders placed on a daily basis.</p>
                        </header>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Recent Orders</h2>
                    <p class="card-subtitle">The last 20 orders are listed below.</p>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Store Name</th>
                            <th>Customer Name</th>
                            <th>Product Name(s)</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Purchase Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <a href="{{ route('admin.store.edit',['id' => $order->store_id ]) }}" style="color: #2466cc;font-weight: bold;">{{ $order->store_name }}</a>
                                </td>
                                <td>
                                    {{ $order->name }} {{ $order->surname }}
                                </td>
                                <td>
                                    @foreach (json_decode($order->products) as $product)
                                       <div>
                                           {{ $product->pname }}
                                       </div>
                                    @endforeach
                                </td>
                                <td>{{ $order->currency_prefix }}{{ $order->total }} {{ $order->currency_suffix }}</td>
                                <td>
                                    <form class="d-flex" action="{{ route('admin.order.update', $order->id) }}" method="POST">
                                        @csrf
                                        <select name="order_status" class="form-control mb-0">
                                            @if($order->order_status === "cancel request")
                                                <option value="cancel request" selected>Cancel Request</option>
                                                <option value="cancelled" >Cancelled</option>
                                            @else
                                                <option value="waiting" @if($order->order_status === 'waiting') selected @endif>Waiting</option>
                                                <option value="approved" @if($order->order_status === 'approved') selected @endif>Approved</option>
                                                <option value="cancelled" @if($order->order_status === 'cancelled') selected @endif>Cancelled</option>
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-link btn-sm"><i class='fas fa-save'></i></button>
                                    </form>
                                </td>
                                <td>{{ is_null($order->created_at) ? "-" : Carbon\Carbon::parse($order->created_at)->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.order.destroy',$order->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        var labels = [];
        for(var i=1;i<31;i++){
            labels.push(i)
        }


        const data = {
            labels: labels,
            datasets: [{
                label: 'Based on {{ $cookie_currency->prefix }}',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {{ $monthly_sales }} ,
            }]
        };
        const config = {
            type: 'line',
            data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Based on {{ $cookie_currency->prefix }}'
                    }
                }
            }
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>




    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
@endsection

@section('end-scripts')
    <script>
        var $table = $('#datatable-tabletools');

        var table = $table.dataTable({
            order: [[ 0, "desc" ]],
            sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    customize : function(doc){
                        var colCount = new Array();
                        $('#datatable-tabletools').find('tbody tr:first-child td').each(function(){
                            if($(this).attr('colspan')){
                                for(var i=1;i<=$(this).attr('colspan');$i++){
                                    colCount.push('*');
                                }
                            }else{ colCount.push('*'); }
                        });
                        doc.content[1].table.widths = colCount;
                    }
                }
            ]
        });

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo( '#datatable-tabletools_wrapper .dt-buttons' );

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    </script>
@endsection

