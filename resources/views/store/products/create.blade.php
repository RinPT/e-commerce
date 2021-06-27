@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/admin/vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="/admin/vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="/admin/vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="/admin/vendor/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="/admin/vendor/codemirror/theme/monokai.css" />
@endsection

@section('content')
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Add a New Product</h2>
            <p class="card-subtitle">You can create a new product here.</p>
        </header>
        <div class="card-body">
            <form action="{{ route('store.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Description</label>
                    <div class="col-lg-6">
                        <textarea type="text" class="form-control" rows="10" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Images</label>
                    <div class="col-lg-6">
                        <input type="file" name="images[]" multiple class="form-control" accept="image/*" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">AR File</label>
                    <div class="col-lg-6">
                        <input type="file" name="ar" multiple class="form-control" accept=".usdz">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Price</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="price">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Shipping Price</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="cargo_price">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Currency</label>
                    <div class="col-lg-6">
                        <select name="currency_id" class="form-control">
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Attributes and Stocks</label>
                    <div class="col-lg-6">
                        <table class="table table-bordered table-striped mb-0" id="datatable-custom">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Attribute</th>
                                    <th>Stock</th>

                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><input type="text" class="form-control" name="attribute_name[]"></td>
                                    <td><input type="text" class="form-control" name="attribute_value[]"></td>
                                    <td><input type="number" class="form-control" name="stock[]"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                    <div class="col-lg-6 text-center">
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
                    </div>
                </div>



            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script src="/admin/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="/admin/vendor/select2/js/select2.js"></script>
<script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="/admin/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="/admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="/admin/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="/admin/vendor/fuelux/js/spinner.js"></script>
<script src="/admin/vendor/dropzone/dropzone.js"></script>
<script src="/admin/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="/admin/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="/admin/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="/admin/vendor/codemirror/lib/codemirror.js"></script>
<script src="/admin/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="/admin/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="/admin/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="/admin/vendor/codemirror/mode/xml/xml.js"></script>
<script src="/admin/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/admin/vendor/codemirror/mode/css/css.js"></script>
<script src="/admin/vendor/summernote/summernote-bs4.js"></script>
<script src="/admin/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
@endsection
