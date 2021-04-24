@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    @if(session('success'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('status') }}.
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
                            <i class="card-big-info-icon fas fa-ad"></i>
                            <h2 class="card-big-info-title">Add New Advertisement</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form action="{{ route('admin.advertisement.store') }}" method="POST" class="form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Category ID</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="inputDefault" name="category_id" @error('category_id')style="border-color: red;"@enderror placeholder="Category ID" value="{{ old('category_id') }}">
                                        @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Image</label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="inputDefault" name="image" @error('image')style="border-color: red;"@enderror placeholder="Image" value="{{ old('image') }}">
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Add +</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/select2/js/select2.js"></script>
@endsection

