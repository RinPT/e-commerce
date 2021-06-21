@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
@endsection

@section('breadcrumb')
    <h2>Products</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Coupons</span></li>
            <li><span>Products</span></li>
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
    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon fas fa-ticket-alt"></i>
                    <h2 class="card-big-info-title">Add a New Coupon</h2>
                    <p class="card-big-info-desc">Add here all details and necessary information.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    <form class="form-horizontal form-bordered" action="{{ route('admin.coupons.store') }}" method="POST">
                        @csrf
                        <div class="form-group row @error('code') has-danger @enderror">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Coupon Code</label>
                            <div class="col-lg-6">
                                <input name="code" type="text" class="form-control" id="inputDefault" value="{{ old('code') }}">
                                @error('code') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('rate') has-danger @enderror">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Rate</label>
                            <div class="col-lg-6">
                                <input name="rate" type="number" class="form-control" id="inputDefault" value="{{ old('rate') }}">
                            </div>
                        </div>
                        <div class="form-group row @error('price') has-danger @enderror">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Price</label>
                            <div class="col-lg-6">
                                <input name="price" type="number" class="form-control" id="inputDefault" value="{{ old('rate') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">End Date</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </span>
                                    <input name="end_date" type="date" class="form-control @error('end_date')is-invalid @enderror">
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
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/autosize/autosize.js"></script>
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="/admin/vendor/fuelux/js/spinner.js"></script>
@endsection
