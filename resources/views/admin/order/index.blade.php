@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('breadcrumb')
    <h2>Order Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Orders</span></li>
            <li><span>Order Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    <section class="card">
        <header class="card-header">

            <h2 class="card-title">Orders</h2>
            <p class="card-subtitle">You can see all available orders below.</p>
        </header>
        <div class="card-body">
            @if(session('updated'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Updated!</strong> {{ session('updated') }}
                </div>
            @endif
            @if(session('deleted'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('deleted') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Whoops!</strong> {{ Session::get('error') }}
                </div>
            @endif
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                <tr>
                    <th>Order ID</th>
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
                                <td>{{ $order->name }} {{ $order->surname }}</td>
                                <td>
                                    @foreach (json_decode($order->products) as $product)
                                        {{ $product->pname }}
                                    @endforeach
                                </td>
                                <td>{{ $order->total }}</td>
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
@endsection

@section('scripts')
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
