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
        <div class="page-header pl-4 pr-4" style="background-image: url(images/page-header/about-us.jpg)">
            <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Welcome {{ auth()->user()->name }} {{ auth()->user()->surname }}!</h1>
            <p class="page-desc text-white mb-0">From your account dashboard you can view your recent orders,<br> manage your shipping and billing addresses,
                and edit your password and account details.</p>
        </div>
        <div class="page-content mt-4 mb-10 pb-6">
            <div class="container">
                <div class="tab tab-vertical gutter-lg">
                    <ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address">Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account">Account details</a>
                        </li>
                    </ul>
                    <div class="tab-content col-lg-9 col-md-8">
                        <div class="tab-pane active" id="orders">
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
                        <div class="tab-pane" id="address">
                            <p class="mb-2">The following addresses will be used on the checkout page by default.</p>

                            @if(session('address.add'))
                                <div class="col-md-6 mb-4">
                                    <div class="alert alert-success alert-simple alert-inline">
                                        <h4 class="alert-title">Success :</h4>
                                        {{ session('address.add') }}
                                        <button type="button" class="btn btn-link btn-close">
                                            <i class="d-icon-times"></i>
                                        </button>
                                    </div>
                                </div>

                            @elseif(session('address.update'))
                                <div class="alert alert-light alert-primary alert-icon mb-4">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ session('address.update') }}
                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>

                            @elseif(session('address.delete'))
                                <div class="alert alert-light alert-danger alert-icon alert-inline mb-4">
                                    <i class="fas fa-trash-alt"></i>
                                    {{ session('address.delete') }}
                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            @endif

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
                                                    <div class="d-flex justify-content-between mr-3">
                                                        <button type="button" class="btn btn-link text-primary ml-2" style="font-size: 12px" data-toggle="modal" data-target="#editAddress{{ $address->id }}">Edit <i class="far fa-edit"></i></button>

                                                        <form action="{{ route('address.destroy', $address->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger" style="font-size: 12px">Remove <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                        <!-- Address Modal -->
                                                        <div class="modal fade" id="editAddress{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('address.update', $address->id) }}" method="POST" class="form">
                                                                            @csrf
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control" name="name" value="{{ $address->name }}">

                                                                            <label>Surname</label>
                                                                            <input type="text" class="form-control" name="surname" value="{{ $address->surname }}">

                                                                            <label>Country</label>
                                                                            <input type="text" class="form-control" name="counrty_id" placeholder="Country" disabled value="{{ $address->country_id }}">

                                                                            <label>City</label>
                                                                            <input type="text" class="form-control" name="city" value="{{ $address->city }}">

                                                                            <label>Address</label>
                                                                            <textarea class="form-control" name="address" rows="2" style="resize: none" placeholder="Street, Apartment No and Other Information">{{ $address->address }}</textarea>

                                                                            <label>Address Type</label>
                                                                            <input type="text" class="form-control" name="address_type" placeholder="Example: Home, Work, etc." value="{{ $address->address_type }}">

                                                                            <label>Postcde</label>
                                                                            <input type="number" class="form-control" name="postcode" value="{{ $address->postcode }}">

                                                                            <label>Phone</label>
                                                                            <input type="tel" class="form-control" name="telephone" value="{{ $address->telephone }}">

                                                                            <div class="d-flex justify-content-end">
                                                                                <button type="button" class="btn btn-link text-danger mr-1" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-link text-primary ml-1">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-6 mb-0 mt-2">
                                        <div class="alert alert-primary alert-simple alert-inline">
                                            There aren't any address in your account!
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <form action="{{ route('address.add') }}" method="POST" class="form">
                                    @csrf
                                    <fieldset>
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
                                            <button type="submit" class="btn btn-link text-primary">Add New Addres</button>
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
                            <form action="{{ route('account.password.update') }}" method="POST" class="form">
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
