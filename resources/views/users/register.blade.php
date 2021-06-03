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
        <div class="page-header" style="background-image: url('/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
            <h3 class="page-subtitle">Hello There!</h3>
            <h1 class="page-title">Are you ready to shop?</h1>
        </div>
        <div class="page-content mt-6 pb-2 mb-10">
            <div class="container">
                <div class="login-popup">
                    <div class="form-box">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-no lh-1 ls-normal" href="#register">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="register">
                                    <form action="{{ route('register') }}" method="post" class="form">
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
                                        <div class="form-group mb-3">
                                            <label>Registration Rules</label>
                                            <textarea class="form-control mb-0" style="min-height: 150px" rows="5" readonly>{{ $reg_rules }}</textarea>
                                        </div>
                                        <div class="form-footer">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"/>
                                                <label class="form-control-label" for="register-agree">I read and agree to the <a href="{{ route('privacy.index') }}" target="_blank">privacy policy</a></label>
                                            </div>
                                            @error('register-agree')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
