@extends('layouts.app')

@section('content')
    <hr/>
    <main class="main">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <h2 class="d-flex justify-content-center mb-0">Welcome</h2>
                <h6 class="d-flex justify-content-center mt-n2">Login or Register to Donald and start filling your chart</h6>
                <div class="col-6">
                    <div class="form-box">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="register">
                                    <form action="{{ route('register') }}" method="POST" class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name <span style="color: rgb(200, 0, 0)">*</span></label>
                                                <input type="text" class="form-control mb-2" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                <p class="" style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name <span style="color: rgb(200, 0, 0)">*</span></label>
                                                <input type="text" class="form-control mb-2" name="surname" value="{{ old('surname') }}">
                                                @error('surname')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <label class="mt-2">Username <span style="color: rgb(200, 0, 0)">*</span></label>
                                        <input type="text" class="form-control mb-2" name="username" value="{{ old('username') }}">
                                        @error('username')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror

                                        <label>Email address <span style="color: rgb(200, 0, 0)">*</span></label>
                                        <input type="email" class="form-control mb-2" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror

                                        <label>Password</label>
                                        <input type="password" class="form-control mb-2" name="password">
                                        @error('password')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror

                                        <label>Password again</label>
                                        <input type="password" class="form-control" name="password_confirmation">

                                        <button type="submit" class="btn btn-primary btn-reveal-right">Register</button>
                                    </form>
                                    <div class="form-choice text-center">
                                        <label class="font-secondary">Sign in with social account</label>
                                        <div class="social-links">
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                            <a href="#" class="social-link social-google fab fa-google"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
