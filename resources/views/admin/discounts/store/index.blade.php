@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
@endsection

@section('breadcrumb')
    <h2>Discount Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Product Discount</span></li>
            <li><span>Discount Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('status'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Info!</strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @elseif($errors->any())
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-warning mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Warning!</strong> There is a problem. Update failed!
                </div>
            </div>
        </div>
    @elseif(session('destroy'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-danger mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('destroy') }}
                </div>
            </div>
        </div>
    @endif
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>
            <h2 class="card-title">Currencies</h2>
            <p class="card-subtitle">You can see all available currencies below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Store Discount</th>
                        <th>Main Discount</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($discounts->count())
                        @foreach ($discounts as $dicount)
                            <tr data-item-id="{{ $discount->id }}">
                                <td>{{ $dicount->id }} </td>
                                <td>{{ $dicount->product_id }}</td>
                                <td>{{ $discount->store_discount }}</td>
                                <td>{{ $discount->main_discount }}</td>
                                <td>{{ $discount->description }}</td>
                                <td>{{ $discount->start_date->format('d.m.Y H:i') }}</td>
                                <td>{{ $discount->end_date->format('d.m.Y H:i') }}</td>
                                <td class="actions d-flex">
                                    <a href="#currencyEdit{{ $discount->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.currency.delete', $discount->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </form>

                                    <!-- Modal Animation -->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
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
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>
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
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
