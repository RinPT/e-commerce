@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon bx bx-plus-circle"></i>
                    <h2 class="card-big-info-title">Add Store Request As a New Store </h2>
                    <p class="card-big-info-desc">You can change the store request information below .</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Success</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.store.save_request',$store_request->id) }}" class="form-horizontal form-bordered mt-5" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store ID</label>
                            <div class="col-lg-6">
                                <input type="text" name="id" class="form-control" id="inputDefault"  required value="{{ $store_request->id }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault"  required value="{{ $store_request->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control" id="inputDefault"  required value="{{ $store_request->username }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                            <div class="col-lg-6">
                                <input type="text" name="email" class="form-control" id="inputDefault"  required value="{{ $store_request->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                            <div class="col-lg-6">
                                <input type="text" name="password" class="form-control" id="inputDefault"  required value="{{ $store_request->password }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Logo</label>
                            <div class="col-lg-6">
                                <input type="text" name="logo" class="form-control" id="inputDefault"  required value="{{ $store_request->logo }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store URL</label>
                            <div class="col-lg-6">
                                <input type="text" name="url" class="form-control" id="inputDefault"  required value="{{ $store_request->url }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Tax No</label>
                            <div class="col-lg-6">
                                <input type="text" name="tax_no" class="form-control" id="inputDefault"  required value="{{ $store_request->tax_no }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Country ID</label>
                            <div class="col-lg-6">
                                <input type="text" name="country_id" class="form-control" id="inputDefault"  required value="{{ $store_request->country_id }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">City</label>
                            <div class="col-lg-6">
                                <input type="text" name="city" class="form-control" id="inputDefault"  required value="{{ $store_request->city }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                            <div class="col-lg-6">
                                <input type="text" name="address" class="form-control" id="inputDefault"  required value="{{ $store_request->address }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Phone</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone" class="form-control" id="inputDefault"  required value="{{ $store_request->phone }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Status</label>
                            <div class="col-lg-6">
                                <input type="text" name="status" class="form-control" id="inputDefault"  required value="{{ $store_request->status }}">
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-dark">Add</button>
                            </div>
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


