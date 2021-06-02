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
                                    <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Login</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="signin">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-3">
                                            <ul class="list mb-0 mt-0">
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-white">
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session('status'))
                                        <div class="alert alert-danger mb-3 text-white">{{ session('status') }}</div>
                                    @endif
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Username or Email Address" value="{{ old('email') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
