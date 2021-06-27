@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
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
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Success</strong> {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Store ID</th>
                    <th>Category ID</th>
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
                    <td>#{{ $product->store_id}}</td>
                    <td>#{{ $product->cid}}</td>
                    <td>{{$product->price}} {{$product->currency}}</td>
                    <td>{{$product->cargo_price}} {{$product->currency}}</td>
                    <td>{{$product->currency}}</td>
                    <td>{{ $product->totalstock }}</td>
                    <td>{{ date('d.m.Y H:i',strtotime($product->updated_at)) }}</td>
                    <td class="actions d-flex">
                        <a href="#productEdit{{ $product->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                        </form>

                        <!-- Modal Animation -->
                        <div id="productEdit{{ $product->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                            <section class="card">
                                <header class="card-header">
                                    <h2 class="card-title">Update Product</h2>
                                </header>
                                <div class="card-body">
                                    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
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
                                            <div class="form-group row @error('category_id') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Category ID</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="category_id" class="form-control" id="inputDefault" value="{{ $product->cid }}">
                                                    @error('category_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row @error('store_id') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store ID</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="store_id" class="form-control" id="inputDefault" value="{{ $product->store_id }}">
                                                    @error('store_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
                                            <div class="form-group mb-4 row @error('currency_id') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Currency</label>
                                                <div class="col-lg-6">
                                                    <select name="currency_id" id="" class="form-control">
                                                        @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->id }}" @if($currency->id == $product->currency_id) selected @endif>{{ $currency->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('currency_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-4 row @error('images') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Images(Optional)</label>
                                                <div class="col-lg-6">
                                                    <input type="file" name="images[]" multiple>
                                                    @error('images') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-4 row @error('ar') has-danger @enderror">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">AR</label>
                                                <div class="col-lg-6">
                                                    <input type="file" name="ar">
                                                    @error('ar') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            @if($product->ar)
                                            <div class="form-group mb-4 row">
                                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">AR File</label>
                                                <div class="col-lg-6">
                                                    <a rel="ar" href="{{ $product->ar }}">
                                                        <button type="button" class="btn btn-dark"><i class="d-icon-mobile mr-2"></i>View on Phone</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="owl-carousel owl-theme">
                                                @foreach($product->images as $image)
                                                    <div style="background: #f0f0f0;padding: 5px;border-radius: 10px;">
                                                        <img src="/photo/product/{{ $image->image }}">
                                                        <div class="text-center mb-2 mt-3">
                                                            <a href="{{ route('admin.product.image.delete',['id' => $image->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt text-white"></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <table class="table table-bordered table-striped mb-0" id="datatable-custom">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Attribute</th>
                                                        <th>Stock</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($product->option as $opt)
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="attribute_name[]" value="{{ $opt['option']->name }}"></td>
                                                        <td><input type="text" class="form-control" name="attribute_value[]" value="{{ $opt['option']->value }}"></td>
                                                        <td><input type="number" class="form-control" name="stock[]" value="{{ $opt['stock']->stock ?? "" }}"></td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="attribute_name[]"></td>
                                                        <td><input type="text" class="form-control" name="attribute_value[]"></td>
                                                        <td><input type="number" class="form-control" name="stock[]"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="attribute_name[]"></td>
                                                        <td><input type="text" class="form-control" name="attribute_value[]"></td>
                                                        <td><input type="number" class="form-control" name="stock[]"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="attribute_name[]"></td>
                                                        <td><input type="text" class="form-control" name="attribute_value[]"></td>
                                                        <td><input type="number" class="form-control" name="stock[]"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                margin:20
            });
        });
    </script>
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
