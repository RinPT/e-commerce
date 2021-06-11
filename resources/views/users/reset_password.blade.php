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
            <h3 class="page-subtitle">Don't Worry!</h3>
            <h1 class="page-title">We Will Help You to reset your password.</h1>
        </div>
        <div class="page-content mt-6 pb-2 mb-10">
            <div class="container">
                <div class="login-popup">
                    <div class="form-box">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Reset Password</a>
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
                                    <form action="{{ route('password.reset.done') }}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Your Email Address" value="{{ old('email') }}"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" name="password" placeholder="New Password"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="New Password Again"/>
                                        </div>
                                        <input type="hidden" name="token" value="{{ $token }}" />
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Reset</button>
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
