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
                    <h2 class="card-big-info-title">Add New Author</h2>
                    <p class="card-big-info-desc">You can add a new author filling below information.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    <form action="{{ route('admin.author.create') }}" class="form-horizontal form-bordered" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Surname</label>
                            <div class="col-lg-6">
                                <input type="text" name="surname" class="form-control" id="inputDefault">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control" id="inputDefault">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                            <div class="col-lg-6">
                                <input type="email" name="email" class="form-control" id="inputDefault">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                            <div class="col-lg-6">
                                <input type="password" name="password" class="form-control" id="inputDefault">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Groups</label>
                            <div class="col-lg-6">
                                <select multiple data-plugin-selectTwo class="form-control populate">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                            <div class="col-lg-6">
                                <div class="switch switch-md switch-dark">
                                    <input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
                                </div>
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


