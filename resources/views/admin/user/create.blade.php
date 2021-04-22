@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon bx bx-plus-circle"></i>
                    <h2 class="card-big-info-title">Add New User</h2>
                    <p class="card-big-info-desc">You can add a new user filling below information.</p>
                </div>
                <div class="tab-pane active" id="register">
                    <form action="{{ route('admin.user.store') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control mb-0" name="name" @error('name') style="border-color: #ff0000;" @enderror placeholder="Your Name" value="{{ old('name') }}"/>
                            @error('name')
                            <p class="text-danger">There is an error</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control mb-0" name="surname" @error('surname')style="border-color: red;"@enderror placeholder="Your Surname" value="{{ old('surname') }}"/>
                            @error('surname')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control mb-0" name="username" @error('username')style="border-color: red;"@enderror placeholder="Your Username" value="{{ old('username') }}"/>
                            @error('username')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control mb-0" name="email" @error('email')style="border-color: red;"@enderror placeholder="Your Email address" value="{{ old('email') }}"/>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control mb-0" name="password" @error('password')style="border-color: red;"@enderror placeholder="Password"/>
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control mb-0" name="password_confirmation" placeholder="Password Again"/>
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"/>
                                <label class="form-control-label" for="register-agree">I agree to the privacy policy</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Register</button>
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

