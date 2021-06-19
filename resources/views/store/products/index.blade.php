@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
        </div>

        <h2 class="card-title">All Products</h2>
        <p class="card-subtitle">You can see all your products below.</p>
    </header>
    <div class="card-body">
        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
        
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Store ID</th>
                    <th>Price</th>
                    <th>Cargo Price</th>
                    <th>Currency</th>
                    <th>Stock</th>
                    <th>Last Update</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>#{{ $product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>#{{ $logged_author->id}}</td>
                    <td>{{$product->price}} {{$product->currency}}</td>
                    <td>{{$product->cargo_price}} {{$product->currency}}</td>
                    <td>{{$product->currency}}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{$product->updated_at}}</td>
                    <td class="actions d-flex">
                        <a href="#productEdit{{ $logged_author->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('store.product.delete', $logged_author->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                        </form>

                        <!-- Modal Animation -->
                        <div id="productEdit{{ $logged_author->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                            <section class="card">
                                <header class="card-header">
                                    <h2 class="card-title">Update Currency</h2>
                                </header>
                                <div class="card-body">
                                    <form action="{{ route('store.product.update', $logged_author->id) }}" method="GET">
                                        @csrf
                                        <div class="modal-wrapper mb-0">
                                            <div class="form-group row @error('name') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $product->name }}">
                                                    @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('description') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Description</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="description" class="form-control" id="inputDefault" value="{{ $product->description }}">
                                                    @error('description') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('price') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Price</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="price" class="form-control" id="inputDefault" value="{{ $product->price }}">
                                                    @error('price') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('cargo_price') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Cargo Price</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="cargo_price" class="form-control" id="inputDefault" value="{{ $product->cargo_price }}">
                                                    @error('cargo_price') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('currency_id') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Currency ID</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="currency_id" class="form-control" id="inputDefault" value="{{ $product->cid }}">
                                                    @error('currency_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('stock') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Stock</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="stock" class="form-control" id="inputDefault" value="{{ $product->stock }}">
                                                    @error('stock') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
    <script src="/admin/js/examples/examples.modals.js"></script>
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
