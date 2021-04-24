@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <style>
        .nav-tabs li .nav-link{
            color: #777777 !important;
        }
        .nav-tabs li.active .nav-link {
            color: black !important;
        }
    </style>
@endsection

@section('content')
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title">General Settings</h2>
            <p class="card-subtitle">You can see all general settings below.</p>
        </header>
        <div class="card-body">
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
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#popular" data-toggle="tab"><i class="fas fa-star"></i> General Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#recent" data-toggle="tab">Contracts</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="popular" class="tab-pane active">
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Site Title</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="inputDefault" value="{{$site_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Site Logo</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="photo" class="form-control" id="inputDefault" accept="image/*">
                                            <div class="text-center mt-3">
                                                <img id="preview-img" class="preview-img" width="150" alt="{{$site_logo}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Default Product Photo</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="photo" class="form-control" id="inputDefault" accept="image/*">
                                            <div class="text-center mt-3">
                                                <img id="preview-img" class="preview-img" width="150" alt="{{$default_product_logo}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Product Count Per Click(Main Page)</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="inputDefault" min="1" value="{{$product_count_per_click_main_page}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Product Count Per Click(Category Page)</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="inputDefault" min="1" value="{{$product_count_per_click_category_page}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email Confirmation Required ?</label>
                                        <div class="col-lg-6">
                                            <input type="checkbox" class="" id="inputDefault" @if($email_confirmation_required) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div id="recent" class="tab-pane">
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Registration Rules</label>
                                        <div class="col-lg-6">
                                            <textarea type="text" class="form-control" id="inputDefault" rows="7">{{$registration_rules}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Privacy Policy</label>
                                        <div class="col-lg-6">
                                            <textarea type="text" class="form-control" id="inputDefault" rows="7">{{$privacy_policy}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Purchase Rules</label>
                                        <div class="col-lg-6">
                                            <textarea type="text" class="form-control" id="inputDefault" rows="7">{{$purchase_rules}}</textarea>
                                        </div>
                                    </div>
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
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
@endsection

@section('end-scripts')

@endsection
