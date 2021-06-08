@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

@endsection

@section('breadcrumb')
    <h2>Edit Slider</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Edit Slider</span></li>
            <li><span>Slider Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('updated'))
        <div class="row">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Notification!</strong> {{ session('updated') }}.
                </div>
            </div>
        </div>
    @endif
    @if(session('deleted'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Notification!</strong> {{ session('deleted') }}.
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @if ($sliders->count())
            @foreach ($sliders as $slider)
                <div class="col-md-6">
                    <section class="card mb-4">
                        <header class="card-header">
                            <h2 class="card-title">{{ $slider->name }}</h2>
                        </header>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center mb-3">
                                <div class="zoom-gallery">
                                    <a class="float-left mb-1 mr-1" href="/photo/slider/{{ $slider->banner }}" title="{{ $slider->name }}"><img class="img-thumbnail" src="/photo/slider/{{ $slider->banner }}" width="275"></a>
                                </div>
                            </div>
                            <hr/>
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputReadOnly">Banner Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $slider->name }}" id="inputReadOnly" class="form-control" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Header</label>
                                    <div class="col-lg-6">
                                        <input name="header" type="text" class="form-control" id="inputDefault" value="{{ $slider->header }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Text</label>
                                    <div class="col-lg-6">
                                        <input name="text" type="text" class="form-control" id="inputDefault" value="{{ $slider->text }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Name</label>
                                    <div class="col-lg-6">
                                        <input name="btn_text" type="text" class="form-control" id="inputDefault" value="{{ $slider->btn_text }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Link</label>
                                    <div class="col-lg-6">
                                        <input name="btn_link" type="text" class="form-control" id="inputDefault" value="{{ $slider->btn_link }}">
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
                                                    <input name="banner" type="file" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-dark mx-1">Update</button>
                                    </div>
                                </div>
                            </form>
                            <form class="row d-flex justify-content-end" action="{{ route('slider.delete', $slider->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-4 my-1">Delete</button>
                            </form>
                        </div>
                    </section>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>
    <script src="/admin/js/examples/examples.lightbox.js"></script>
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
@endsection
