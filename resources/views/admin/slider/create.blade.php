@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

@endsection

@section('breadcrumb')
    <h2>Create Slider</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Create Slider</span></li>
            <li><span>Slider Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('created'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Created!</strong> {{ session('created') }}.
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon fas fa-image"></i>
                            <h2 class="card-big-info-title">Add New Slider</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form class="form-horizontal form-bordered" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row @error('name') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Banner Name</label>
                                    <div class="col-lg-6">
                                        <input name="name" type="text" class="form-control" id="inputDefault" value="{{ old('name') }}">
                                        @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('header') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Header</label>
                                    <div class="col-lg-6">
                                        <input name="header" type="text" class="form-control" id="inputDefault" value="{{ old('header') }}">
                                        @error('header') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('text') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Text</label>
                                    <div class="col-lg-6">
                                        <input name="text" type="text" class="form-control" id="inputDefault" value="{{ old('text') }}">
                                        @error('text') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('btn_text') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Name</label>
                                    <div class="col-lg-6">
                                        <input name="btn_text" type="text" class="form-control" id="inputDefault" value="{{ old('btn_text') }}">
                                        @error('btn_text') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('btn_link') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Button Link</label>
                                    <div class="col-lg-6">
                                        <input name="btn_link" type="text" class="form-control" id="inputDefault" value="{{ old('btn_link') }}">
                                        @error('btn_link') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
                                <div class="form-group row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/autosize/autosize.js"></script>
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
@endsection
