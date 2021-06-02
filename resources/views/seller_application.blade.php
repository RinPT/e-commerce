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
            <h1 class="page-title">Seller Application Form</h1>
            <p class="text-white mt-3">All applications will be aproved by the admin! Please provide all necessary information about your company in the form below.</p>
        </div>
        <div class="page-content mt-6 pb-2 mb-10">
            <div class="container">
                <div class="login-popup" style="max-width: 100%;">
                    <div class="form-box">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <div class="tab-content">
                                <div class="tab-pane active" id="signin">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-4">
                                            <ul class="list mb-0 mt-0">
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-white">
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Session::has('success'))
                                        <div class="alert alert-success text-white mb-4">
                                            <strong>Success</strong> {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger text-white mb-4">
                                            <strong>Error!</strong> {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('application.form.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Store Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Store Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">E-mail Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Phone</label>
                                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country" class="font-weight-bold">Country</label>
                                                    <select class="form-control" name="country" required>
                                                        @foreach($countries as $c)
                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url" class="font-weight-bold">Category of the Products</label>
                                                    <select class="form-control" name="category" required>
                                                        @foreach($categories as $c)
                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="username" class="font-weight-bold">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tax" class="font-weight-bold">Tax No</label>
                                                    <input type="text" class="form-control" id="tax" name="tax" placeholder="Tax No" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo" class="font-weight-bold">Logo</label>
                                                    <input type="file" class="form-control" id="logo" name="logo" placeholder="logo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="city" class="font-weight-bold">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url" class="font-weight-bold">Web URL</label>
                                                    <input type="url" class="form-control" id="url" name="url" placeholder="Web URL">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="address" class="font-weight-bold">Address</label>
                                                    <textarea type="text" class="form-control" id="address" name="address" style="min-height: 100px;" placeholder="Address" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Apply Now!</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="register">
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
