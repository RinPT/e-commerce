@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
@endsection

@section('breadcrumb')
    <h2>Products</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Coupons</span></li>
            <li><span>Products</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('updated'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Info!</strong> {{ session('updated') }}
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
    @elseif(session('deleted'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-danger mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('deleted') }}
                </div>
            </div>
        </div>
    @endif
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Coupons</h2>
            <p class="card-subtitle">You can see all available coupons below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Rate (%)</th>
                        <th>Price</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($coupons->count())
                        @foreach ($coupons as $coupon)
                            <tr data-item-id="{{ $coupon->id }}">
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->rate }}</td>
                                <td>{{ $coupon->price }}</td>
                                <td>{{ date('d-m-Y', strtotime($coupon->end_date)) }}</td>
                                <td class="actions d-flex">
                                    <a href="#couponEdit{{ $coupon->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.coupons.delete', $coupon->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </form>

                                    <!-- Modal Animation -->
									<div id="couponEdit{{ $coupon->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Update Coupons</h2>
											</header>
											<div class="card-body">
                                                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">
                                                        <div class="form-group row @error('code') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Coupon Code</label>
                                                            <div class="col-lg-7">
                                                                <input name="code" type="text" class="form-control" id="inputDefault" value="{{ $coupon->code }}">
                                                                @error('code') <p class="text-danger">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('rate') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Rate</label>
                                                            <div class="col-lg-7">
                                                                <input name="rate" type="number" class="form-control" id="inputDefault" value="{{ $coupon->rate }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('price') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Price</label>
                                                            <div class="col-lg-7">
                                                                <input name="price" type="number" class="form-control" id="inputDefault" value="{{ $coupon->price }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">End Date</label>
                                                            <div class="col-lg-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-calendar-alt"></i>
                                                                        </span>
                                                                    </span>
                                                                    <input name="end_date" type="date" class="form-control @error('end_date')is-invalid @enderror" value="{{ date('Y-m-d', strtotime($coupon->end_date)) }}">
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
