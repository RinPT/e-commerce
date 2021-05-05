@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    @if(session('created'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('created') }}
                </div>
            </div>
        </div>
    @elseif(session('error'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            </div>
        </div>
    @endif
    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon bx bx-plus-circle"></i>
                    <h2 class="card-big-info-title">Add New Country</h2>
                    <p class="card-big-info-desc">You can add a new country by filling below information.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    <form action="{{ route('admin.cargo.store') }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Country ID</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputDefault" name="id" @error('countryid')style="border-color: red;"@enderror placeholder="Country ID" value="{{ old('id') }}">
                                @error('countryid')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Country Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputDefault" name="name" @error('name')style="border-color: red;"@enderror placeholder="Country Name" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">ISO Code</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputDefault" name="iso_code" @error('isocode')style="border-color: red;"@enderror placeholder="ISO Code" value="{{ old('iso_code') }}">
                                @error('isocode')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                            <div class="col-lg-6">
                                <select class="form-control mb-3" name="status">
                                    <option selected>0</option>
                                    <option>1</option>
                                </select>
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
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/select2/js/select2.js"></script>
@endsection


