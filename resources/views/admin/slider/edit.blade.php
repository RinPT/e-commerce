@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

@endsection

@section('breadcrumb')
    <h2>Slider Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Slider Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Notification!</strong> {{ session('status') }}.
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <section class="card mb-4">
                <header class="card-header">
                    <h2 class="card-title">Banner 1</h2>
                </header>
                <div class="card-body">
                    <div class="zoom-gallery">
                        <a class="float-left mb-1 mr-1" href="/photo/slider/banner_1.jpg" title="Banner 1"><img class="img-thumbnail" src="/photo/slider/banner_1.jpg" width="275"></a>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="card mb-4">
                <header class="card-header">
                    <h2 class="card-title">Banner 2</h2>
                </header>
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="zoom-gallery">
                            <a class="float-left mb-1 mr-1" href="/photo/slider/banner_2.jpg" title="Banner 2"><img class="img-thumbnail" src="/photo/slider/banner_2.jpg" width="275"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon fas fa-image"></i>
                            <h2 class="card-big-info-title">Edit Banners</h2>
                            <p class="card-big-info-desc">Provide all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Select Banner</label>
                                <div class="col-lg-6">
                                    <select class="form-control mb-3">
                                        <option>Banner 1</option>
                                        <option>Banner 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Header</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDefault">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Title</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDefault">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDefault">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Link</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="inputDefault">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Upload New Banner</label>
                                <div class="col-lg-6">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select image</span>
                                                <input type="file" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>
    <script src="/admin/js/examples/examples.lightbox.js"></script>
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
@endsection
