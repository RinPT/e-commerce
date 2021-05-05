@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    @if(session('created'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('created') }}.
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
                            <i class="card-big-info-icon far fa-user"></i>
                            <h2 class="card-big-info-title">Add New User</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form action="{{ route('admin.user.store') }}" method="POST" class="form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="inputDefault" name="name" @error('name')style="border-color: red;"@enderror placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Surame</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="inputDefault" name="surname" @error('surname')style="border-color: red;"@enderror placeholder="Surname" value="{{ old('surname') }}">
                                        @error('surname')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="inputDefault" name="username" @error('username')style="border-color: red;"@enderror placeholder="Username" value="{{ old('username') }}">
                                        @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">E-mail</label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="inputDefault" name="email" @error('email')style="border-color: red;"@enderror placeholder="E-mail" value="{{ old('email') }}">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Password</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="inputDefault" name="password" @error('password')style="border-color: red;"@enderror placeholder="password" >
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Repeat Password</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="inputDefault" name="password_confirmation" placeholder="Password Again" >
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

