@extends('layouts.home')

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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name <span style="color: rgb(200, 0, 0)">*</span></label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name <span style="color: rgb(200, 0, 0)">*</span></label>
                                                <input type="text" class="form-control" name="surname" required>
                                            </div>
                                        </div>

                                        <label>Email address <span style="color: rgb(200, 0, 0)">*</span></label>
                                        <input type="email" class="form-control" name="email" required>

                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">

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
