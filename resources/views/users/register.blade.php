@extends('layouts.app')

@section('stylesheet')
	<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="/css/user/style.min.css">

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <div class="page-content mt-6 pb-2 mb-10">
            <div class="container">
                <div class="login-popup">
                    <div class="form-box">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link border-no lh-1 ls-normal" href="#signin">Login</a>
                                </li>
                                <li class="delimiter">or</li>
                                <li class="nav-item">
                                    <a class="nav-link active border-no lh-1 ls-normal" href="#register">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="signin">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        @if(session('status'))
                                            <p class="text-danger">{{ session('status') }}</p>
                                        @endif

                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Username or Email Address" value="{{ old('email') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                                        </div>
                                        <div class="form-footer">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="custom-checkbox"
                                                    name="remember" />
                                                <label class="form-control-label" for="signin-remember">Remember
                                                    me</label>
                                            </div>
                                            <a href="#" class="lost-link">Lost your password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Login</button>
                                    </form>
                                </div>
                                <div class="tab-pane active" id="register">
                                    <form action="{{ route('register') }}" method="POST" class="form">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control mb-0" name="name" @error('name') style="border-color: red;" @enderror placeholder="Your Name" value="{{ old('name') }}"/>
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
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
