@extends('layouts.admin.main')

@section('custom-styles')
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
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title">Add a New Category</h2>
            <p class="card-subtitle">You can create a new category here.</p>
        </header>
        <div class="card-body">
            <form action="{{ route('store.categories') }}" method="post" enctype="multipart/form-data">
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
                    <label class="col-lg-3 control-label text-lg-right pt-2">Image</label>
                    <div class="col-lg-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Meta Title</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault" name="meta_title">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Meta Keywords</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault" name="meta_keywords">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Meta Description</label>
                    <div class="col-lg-6">
                        <textarea type="text" class="form-control" rows="10" name="meta_description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Parent Category</label>
                    <div class="col-lg-6">
                        <select name="parent_id" class="form-control">
                            <option value="0">None</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->parent_id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Sort Order</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="sort_order">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Status</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="status">
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

@section('custom-scripts')
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
