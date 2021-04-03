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

    <main class="main account">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>Account</li>
                </ul>
            </div>
        </nav>
        <div class="page-content mt-4 mb-10 pb-6">
            <div class="container">
                <h2 class="title title-center mb-10">My Account</h2>
                <div class="tab tab-vertical gutter-lg">
                    <ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#downloads">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address">Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account">Account details</a>
                        </li>
                    </ul>
                    <div class="tab-content col-lg-9 col-md-8">
                        <div class="tab-pane active" id="dashboard">
                            <p class="mb-8">
                                From your account dashboard you can view your recent orders, manage your shipping and billing
                                    addresses,<br>and edit your password and account details.
                            </p>
                            <div class="row">
                                <div class="col-9 d-flex justify-content-between">
                                    <form action="{{ route('account.delete') }}" method="POST" class="form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-rounded"><span class="d-flex align-items-center">Delete Account<i class="fas fa-trash-alt ml-2"></i></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="orders">
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th class="pl-2">Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th class="pr-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="order-number"><a href="#">#3596</a></td>
                                        <td class="order-date"><time>February 24, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$900.00 for 5 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                    <tr>
                                        <td class="order-number"><a href="#">#3593</a></td>
                                        <td class="order-date"><time>February 21, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$290.00 for 2 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                    <tr>
                                        <td class="order-number"><a href="#">#2547</a></td>
                                        <td class="order-date"><time>January 4, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$480.00 for 8 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                    <tr>
                                        <td class="order-number"><a href="#">#2549</a></td>
                                        <td class="order-date"><time>January 19, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$680.00 for 5 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                    <tr>
                                        <td class="order-number"><a href="#">#4523</a></td>
                                        <td class="order-date"><time>Jun 6, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$564.00 for 3 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                    <tr>
                                        <td class="order-number"><a href="#">#4526</a></td>
                                        <td class="order-date"><time>Jun 19, 2021</time></td>
                                        <td class="order-status"><span>On hold</span></td>
                                        <td class="order-total"><span>$123.00 for 8 items</span></td>
                                        <td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="downloads">
                            <p class="mb-4 text-body">Fill all necessary fields to create a product!</p>
                            <form action="{{ route('product.create') }}" method="POST" class="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" @error('product_name') style="border-color: red" @enderror name="product_name" id="product_name" placeholder="Product Name" value="">
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" @error('product_description') style="border-color: red" @enderror name="product_description" id="product_description" rows="3" placeholder="Product Description">{{ old('product_description') }}</textarea>
                                </div>
                                <div class="form-group mt-3 d-flex">
                                    <input type="number" class="form-control" @error('price') style="border-color: red" @enderror name="price" id="price" placeholder="Price">
                                    <input type="number" class="form-control" @error('cargo_price') style="border-color: red" @enderror name="cargo_price" id="cargo_price" placeholder="Cargo Price">
                                </div>

                                <button type="submit" class="btn btn-link">Add Product</button>

                            </form>
                        </div>
                        <div class="tab-pane" id="address">
                            <p class="mb-2">The following addresses will be used on the checkout page by default.
                            </p>
                            <div class="row">
                                @if ($addresses->count())
                                    @foreach ($addresses as $address)
                                        <div class="col-sm-4 mb-4">
                                            <div class="card card-address">
                                                <div class="card-body border border-secondary rounded">
                                                    <h5 class="mb-1">{{ $address->address_type }}</h5>
                                                    <hr/>
                                                    <p><strong>{{ $address->name }} {{ $address->surname }}</strong><br>
                                                        {{ $address->address }}<br>
                                                        {{ $address->city }}<br>
                                                        {{ $address->postcode }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <form action="{{ route('address.add') }}" method="POST" class="form">
                                    @csrf
                                    <fieldset>
                                        @if(session('newAddress'))
                                        <p class="text-success">{{ session('pass') }}</p>
                                        @endif

                                        <legend>Add New Address</legend>
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name">

                                        <label>Surname</label>
                                        <input type="text" class="form-control" name="surname">

                                        <label>Country</label>
                                        <input type="text" class="form-control" name="counrty_id" placeholder="Country" disabled>

                                        <label>City</label>
                                        <input type="text" class="form-control" name="city">

                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="2" style="resize: none" placeholder="Street, Apartment No and Other Information"></textarea>

                                        <label>Address Type</label>
                                        <input type="text" class="form-control" name="address_type" placeholder="Example: Home, Work, etc.">

                                        <label>Postcde</label>
                                        <input type="number" class="form-control" name="postcode">

                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="telephone">

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-link text-primary">Add New Addres <i class="far fa-edit"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="account">
                            @if(session('status'))
                                <p class="text-danger">{{ session('info') }}<p>
                            @endif
                            <form action="{{ route('account.update') }}" method="POST" class="form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="surname" value="{{ auth()->user()->surname }}">
                                    </div>
                                </div>

                                <label>Display Name</label>
                                <input type="text" class="form-control mb-0" name="username" value="{{ auth()->user()->username }}">
                                <small class="d-block form-text mb-7">This will be how your name will be displayed
                                    in the account section and in reviews</small>

                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">

                                <label>Phone Number</label>
                                <input type="tel" class="form-control" name="phone" value="{{ auth()->user()->phone }}">

                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                            </form>
                            <form action="{{ route('password.update') }}" method="POST" class="form">
                                @csrf
                                <fieldset>
                                    @if(session('pass'))
                                    <p class="text-danger">{{ session('pass') }}</p>
                                    @endif

                                    <legend>Password Change</legend>
                                    <label>Current password</label>
                                    <input type="password" class="form-control" name="old_password">

                                    <label>New password</label>
                                    <input type="password" class="form-control" name="password">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control" name="password_confirmation">

                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
