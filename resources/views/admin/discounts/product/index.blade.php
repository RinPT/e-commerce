@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
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
            <h2 class="card-title">Discounts</h2>
            <p class="card-subtitle">You can see all available discounts below.</p>
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
                        @foreach ($discounts as $discount)
                            <tr data-item-id="{{ $discount->id }}">
                                <td>{{ $discount->id }} </td>
                                <td>{{ $discount->product_id }}</td>
                                <td>{{ $discount->store_discount }}</td>
                                <td>{{ $discount->main_discount }}</td>
                                <td>{{ $discount->description }}</td>
                                <td>{{ date('d/m/Y', strtotime($discount->start_date)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($discount->end_date)) }}</td>
                                <td class="actions d-flex">
                                    <a href="#currencyEdit{{ $discount->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('product.discount.destroy', $discount->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </form>

                                    <!-- Modal Animation -->
									<div id="currencyEdit{{ $discount->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Update Discount</h2>
											</header>
											<div class="card-body">
                                                <form action="{{ route('product.discount.update', $discount->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">
                                                        <div class="form-group row @error('store_discount') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Discount</label>
                                                            <div class="col-lg-6">
                                                                <input name="store_discount" type="number" class="form-control" id="inputDefault" value="{{ $discount->store_discount }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('main_discount') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Main Discount</label>
                                                            <div class="col-lg-6">
                                                                <input name="main_discount" type="number" class="form-control" id="inputDefault" value="{{ $discount->main_discount }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('description') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="textareaAutosize">Description</label>
                                                            <div class="col-lg-6">
                                                                <textarea name="description" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ $discount->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Start/End Date</label>
                                                            <div class="col-lg-6">
                                                                <div class="input-daterange input-group">
                                                                    <input type="date" class="form-control @error('start_date')is-invalid @enderror" name="start_date" value="{{ date('Y-m-d', strtotime($discount->start_date)) }}">
                                                                    <span class="input-group-text border-left-0 border-right-0 rounded-0">
                                                                        to
                                                                    </span>
                                                                    <input type="date" class="form-control @error('end_date')is-invalid @enderror" name="end_date" value="{{ date('Y-m-d', strtotime($discount->end_date)) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button class="btn btn-default modal-dismiss">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
											</div>
										</section>
									</div>
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

    <script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="/admin/vendor/fuelux/js/spinner.js"></script>
    <script src="/admin/vendor/autosize/autosize.js"></script>
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
