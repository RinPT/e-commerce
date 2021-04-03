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

            <h2 class="card-title">Create a New Ticket</h2>
            <p class="card-subtitle">You can create a new ticket below.</p>
        </header>
        <div class="card-body">
            <form action="{{route('add.user_group')}}" method="post">
                @csrf

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Store Name</label>
                    <div class="col-lg-6">
                        <select data-plugin-selectTwo class="form-control populate">
                            <option value="AK">AliMarket</option>
                            <option value="HI">HasanCabbar</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Subject(Title)</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Urgency</label>
                    <div class="col-lg-6">
                        <select data-plugin-selectTwo class="form-control populate">
                            <option>Low</option>
                            <Option>Medium</option>
                            <option>High</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                    <div class="col-lg-6">
                        <select data-plugin-selectTwo class="form-control populate">
                            <option>Open</option>
                            <Option>Closed</option>
                            <option>Answered</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Message</label>
                    <div class="col-lg-6">
                        <textarea type="text" class="form-control" rows="10"></textarea>
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
