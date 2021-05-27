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
                    <i class="card-big-info-icon bx bx-pencil"></i>
                    <h2 class="card-big-info-title">Update Store</h2>
                    <p class="card-big-info-desc">You can update store by changing the information below.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                    <form action="{{ route('admin.store.update',$id) }}" class="form-horizontal form-bordered mt-5" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $store->name }}" required>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control" id="inputDefault" value="{{ $store->username }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                            <div class="col-lg-6">
                                <input type="text" name="email" class="form-control" id="inputDefault" value="{{ $store->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                            <div class="col-lg-6">
                                <input type="text" name="password" class="form-control" id="inputDefault" placeholder="Leave blank if you won't change password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Logo</label>
                            <div class="col-lg-6">
                                <input type="file" name="logo" class="form-control" id="inputDefault">
                                @if(!empty($store->logo))
                                    <img src="/photo/store/{{ $store->logo }}" width="200" class="thumbnail mt-2">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store URL</label>
                            <div class="col-lg-6">
                                <input type="text" name="url" class="form-control" id="inputDefault" value="{{ $store->url }}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Tax No</label>
                            <div class="col-lg-6">
                                <input type="text" name="tax_no" class="form-control" id="inputDefault" value="{{ $store->tax_no }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Country</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if($store->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">City</label>
                            <div class="col-lg-6">
                                <input type="text" name="city" class="form-control" id="inputDefault" value="{{ $store->city }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                            <div class="col-lg-6">
                                <textarea type="text" name="address" class="form-control" rows="7" id="inputDefault" required>{{ $store->address }}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Phone</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone" class="form-control" id="inputDefault" value="{{ $store->phone }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                            <div class="col-lg-6">
                                <div class="switch switch-md switch-dark">
                                    <input type="checkbox" name="status" data-plugin-ios-switch @if($store->status) checked @endif/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-dark">Update</button>
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


