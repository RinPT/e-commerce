@extends('layouts.app')

@section('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

@section('custom-css')
    <style>
        .modal-backdrop.show {
            z-index: 9999;
        }
        .modal-open .modal{
            z-index: 99999;
        }
        input:focus,select:focus,textarea:focus{
            box-shadow: 0 0 !important;
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
                            <a class="nav-link @if(!(session('address.add') || session('address.update') || session('address.delete'))) active @endif" href="#orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if((session('address.add') || session('address.update') || session('address.delete'))) active @endif" href="#billings">Invoices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(session('address.add') || session('address.update') || session('address.delete')) active @endif" href="#address">Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account">Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tickets">Support Tickets</a>
                        </li>
                    </ul>
                    <div class="tab-content col-lg-9 col-md-8">
                        <div class="tab-pane @if(!(session('address.add') || session('address.update') || session('address.delete'))) active in @endif" id="orders">
                            @if(session('order.success'))
                                <div class="alert alert-success alert-simple alert-inline">
                                    <h4 class="alert-title">Success :</h4>
                                    {{ session('order.success') }}
                                    <button type="button" class="btn btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            @endif
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th class="pl-2">Order ID</th>
                                        <th>Store Name</th>
                                        <th>Products</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th class="pr-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $o)
                                    <tr>
                                        <td>
                                            <a>#{{ $o->id }}</a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ route('store.products',['name' => 'store', 'id' => $o->store_id ]) }}">{{ $o->store_name }}</a>
                                        </td>
                                        <td>
                                            @foreach(json_decode($o->products) as $p)
                                                <div>
                                                    {{ $p->pname }} x {{ $p->pcount }}
                                                    @if(count((array)$p->options))
                                                    <div>
                                                        <span style="font-size: 12px"><i class="fas fa-angle-double-right"></i> Options</span>
                                                        @foreach($p->options as $key => $op)
                                                            <div style="font-size: 12px" class="pl-3">{{ $key }}: {{ $op }}</div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span>{{ $o->currency_prefix }}{{ $o->total }} {{ $o->currency_suffix }}</span>
                                        </td>
                                        <td>
                                            @if($o->order_status == 'waiting')
                                                <span class="badge badge-warning text-capitalize">{{ $o->order_status }}</span>
                                            @elseif($o->order_status == 'approved')
                                                <span class="badge badge-success text-capitalize">{{ $o->order_status }}</span>
                                            @elseif($o->order_status == 'cancelled')
                                                <span class="badge badge-dark text-capitalize">{{ $o->order_status }}</span>
                                            @else
                                                <span class="badge badge-primary text-capitalize">{{ $o->order_status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $o->created_at->format('d.m.Y H:i') }}</td>
                                        <td class="order-action">
                                            @if($o->order_status == 'waiting' || $o->order_status == 'cancel request')
                                            <a href="{{ route('order.delete',['id' => $o->id]) }}" class="btn" style="padding: 10px 20px;">Cancel</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">There is no order for this account.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane @if((session('address.add') || session('address.update') || session('address.delete'))) active in @endif" id="billings">
                            <table class="order-table">
                                <thead>
                                <tr>
                                    <th class="pl-2">Invoice ID</th>
                                    <th>Store Name</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th class="pr-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bills as $b)
                                <tr>
                                    <td>
                                        <a href="{{ route('invoice',['id'=> $b->invoice_no]) }}" target="_blank">#{{ $b->invoice_no }}</a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ route('store.products',['name' => 'store', 'id' => $b->store_id ]) }}">{{ $b->store_name }}</a>
                                    </td>
                                    <td>
                                        <span>{{ $b->currency_prefix }}{{ $b->total }} {{ $b->currency_suffix }}</span>
                                    </td>
                                    <td>
                                        @if($b->status == 'unpaid')
                                            <span class="badge badge-danger text-capitalize">{{ $b->status }}</span>
                                        @else
                                            <span class="badge badge-success text-capitalize">{{ $b->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $b->created_at->format('d.m.Y H:i') }}</td>
                                    <td class="order-action">
                                        <a target="_blank" href="{{ route('invoice',['id'=> $b->invoice_no]) }}" class="btn" style="padding: 10px 20px;">View</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">There is no billing for this account.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane @if(session('address.add') || session('address.update') || session('address.delete')) active in @endif" id="address">
                            <p class="mb-2">The following addresses will be used on the checkout page by default.</p>

                            @if(session('address.add'))
                                <div class="alert alert-success alert-simple alert-inline">
                                    <h4 class="alert-title">Success :</h4>
                                    {{ session('address.add') }}
                                    <button type="button" class="btn btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>

                            @elseif(session('address.update'))
                                <div class="alert alert-light alert-primary alert-icon mb-4">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ session('address.update') }}
                                    <button type="button" class="btn btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>

                            @elseif(session('address.delete'))
                                <div class="alert alert-light alert-danger alert-icon alert-inline mb-4">
                                    <i class="fas fa-trash-alt"></i>
                                    {{ session('address.delete') }}
                                    <button type="button" class="btn btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            @endif


                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                                Add New Address
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row p-4">
                                                <form action="{{ route('address.add') }}" method="POST" class="form add-form">
                                                    @csrf
                                                    <div class="row institutional-inputs" style="display: none">
                                                        <div class="col-md-6">
                                                            <label>Company</label>
                                                            <input type="text" class="form-control" name="company">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Tax No</label>
                                                            <input type="text" class="form-control" name="tax_no">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" name="name">

                                                            <label>Surname</label>
                                                            <input type="text" class="form-control" name="surname">

                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city">

                                                            <label>Phone</label>
                                                            <input type="tel" class="form-control" name="telephone">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="user_type">User Type</label>
                                                                <select class="form-control" name="user_type" required>
                                                                    <option value="individual">Individual</option>
                                                                    <option value="institutional">Institutional</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" name="country" required>
                                                                    @foreach($countries as $c)
                                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label>Address Type</label>
                                                            <input type="text" class="form-control" name="address_type" placeholder="Example: Home, Work, etc.">

                                                            <label>Postcode</label>
                                                            <input type="number" class="form-control" name="postcode">
                                                        </div>
                                                    </div>

                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" rows="2" placeholder="Street, Apartment No and Other Information"></textarea>


                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-dark">Add New Address</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @if ($addresses->count())
                                    @foreach ($addresses as $address)
                                        <div class="col-sm-4 mb-4">
                                            <div class="card card-address">
                                                <div class="card-body border p-4 rounded">
                                                    <h5 class="mb-1">{{ $address->address_type }} <span class="text-capitalize">({{ $address->user_type }})</span></h5>
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
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('address.update', $address->id) }}" method="POST" class="form update-form">
                                                                            @csrf

                                                                            <div class="row institutional-inputs" @if($address->user_type == 'individual') style="display: none" @endif>
                                                                                <div class="col-md-6">
                                                                                    <label>Company</label>
                                                                                    <input type="text" class="form-control" name="company" value="{{ $address->company }}">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label>Tax No</label>
                                                                                    <input type="text" class="form-control" name="tax_no" value="{{ $address->tax_no }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>Name</label>
                                                                                    <input type="text" class="form-control" name="name" value="{{ $address->name }}">

                                                                                    <label>Surname</label>
                                                                                    <input type="text" class="form-control" name="surname" value="{{ $address->surname }}">

                                                                                    <label>City</label>
                                                                                    <input type="text" class="form-control" name="city" value="{{ $address->city }}">

                                                                                    <label>Phone</label>
                                                                                    <input type="tel" class="form-control" name="telephone" value="{{ $address->telephone }}">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="user_type">User Type</label>
                                                                                        <select class="form-control" name="user_type" required>
                                                                                            <option value="individual" @if($address->user_type == 'individual') selected @endif>Individual</option>
                                                                                            <option value="institutional" @if($address->user_type == 'institutional') selected @endif>Institutional</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="country">Country</label>
                                                                                        <select class="form-control" name="country" required>
                                                                                            @foreach($countries as $c)
                                                                                                <option value="{{ $c->id }}" @if($address->country_id == $c->id) selected @endif>{{ $c->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <label>Address Type</label>
                                                                                    <input type="text" class="form-control" name="address_type" placeholder="Example: Home, Work, etc." value="{{ $address->address_type }}">

                                                                                    <label>Postcode</label>
                                                                                    <input type="number" class="form-control" name="postcode" value="{{ $address->postcode }}">
                                                                                </div>
                                                                            </div>

                                                                            <label>Address</label>
                                                                            <textarea class="form-control" name="address" rows="2" placeholder="Street, Apartment No and Other Information" >{{ $address->address }}</textarea>

                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="submit" class="btn btn-dark">Save changes</button>
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
                        <div class="tab-pane" id="tickets">

                            @if(session('ticket.create'))
                                <div class="alert alert-success alert-simple alert-inline">
                                    <h4 class="alert-title">Success :</h4>
                                    {{ session('ticket.create') }}
                                    <button type="button" class="btn btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            @endif


                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createTic">
                                Create New Ticket
                            </button>

                            <div class="modal fade" id="createTic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create New Ticket</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row p-4">
                                                <form action="{{ route('ticket.create') }}" method="POST" class="form add-form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="department">Departments</label>
                                                                <select class="form-control" name="department" required>
                                                                    @foreach($departments as $d)
                                                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="who">To Who</label>
                                                                <select class="form-control" name="who" required>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="store">Store</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 store-select" style="display: none">
                                                            <div class="form-group">
                                                                <label for="user_type">Stores</label>
                                                                <select class="form-control" name="store" required>
                                                                    @foreach($stores as $s)
                                                                        <option value="{{ $s->id }}">[{{ $s->id }}]{{ $s->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="custom-fields">
                                                        @foreach($cfields as $c)
                                                            <div class="cfield" data-did="{{ $c->department_id }}" style="display: none">
                                                            @if($c->type == "text")
                                                                <label for="cf[{{ $c->id }}]">{{ $c->name }}</label>
                                                                <input class="form-control mb-0" name="cf[{{ $c->id }}]">
                                                                <small class="mb-2">{{ $c->description }}</small>
                                                            @else
                                                                <select name="cf[{{ $c->id }}]">
                                                                    @foreach($c->select_options as $opt)
                                                                        <option value="{{ $opt }}">{{ $opt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <label>Title</label>
                                                    <input class="form-control" name="title" required>

                                                    <label for="urgency">Urgency</label>
                                                    <select class="form-control" name="urgency" required>
                                                        <option value="low">Low</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="high">High</option>
                                                        <option value="very high">Very High</option>
                                                        <option value="critical">Critical</option>
                                                    </select>

                                                    <label>Message</label>
                                                    <textarea class="form-control" name="message" rows="5" placeholder="Your Message..." required></textarea>


                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-dark">Create a Ticket</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @if(session('ticket.success'))
                                    <div class="alert alert-success alert-simple alert-inline">
                                        <h4 class="alert-title">Success :</h4>
                                        {{ session('order.success') }}
                                        <button type="button" class="btn btn-close">
                                            <i class="d-icon-times"></i>
                                        </button>
                                    </div>
                                @endif
                            <table class="order-table">
                                <thead>
                                <tr>
                                    <th class="pl-2">Ticket ID</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Urgency</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th class="pr-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($tickets as $t)
                                    <tr>
                                        <td>
                                            <a href="{{ route('ticket.view',['tid'=> $t->id]) }}">#{{ $t->id }}</a>
                                        </td>
                                        <td>
                                            <a class="text-capitalize">{{ $t->title }}</a>
                                        </td>
                                        <td>
                                            <span>{{ $t->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-capitalize">{{ $t->urgency }}</span>
                                        </td>
                                        <td>
                                            @if($t->status == 'open')
                                                <span class="badge badge-success text-capitalize">{{ $t->status }}</span>
                                            @elseif($t->status == 'answered')
                                                <span class="badge badge-warning text-capitalize">{{ $t->status }}</span>
                                            @else
                                                <span class="badge badge-dark text-capitalize">{{ $t->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $t->created_at->format('d.m.Y H:i') }}</td>
                                        <td class="order-action">
                                            <a href="{{ route('ticket.view',['tid'=> $t->id]) }}" class="btn" style="padding: 10px 20px;">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">There is no ticket for this account.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('javaScript')
    <script>
        $('.add-form select[name=user_type]').change(function (){
            if($(this).val() === 'institutional'){
                $('.add-form .institutional-inputs').css('display','')
                $('.add-form input[name=company]').attr('required','required')
                $('.add-form input[name=tax_no]').attr('required','required')
            }else{
                $('.add-form .institutional-inputs').css('display','none')
                $('.add-form input[name=company]').removeAttr('required')
                $('.add-form input[name=tax_no]').removeAttr('required')
            }
        })

        $('.update-form select[name=user_type]').change(function (){
            if($(this).val() === 'institutional'){
                $('.update-form .institutional-inputs').css('display','')
                $('.update-form input[name=company]').attr('required','required')
                $('.update-form input[name=tax_no]').attr('required','required')
            }else{
                $('.update-form .institutional-inputs').css('display','none')
                $('.update-form input[name=company]').removeAttr('required')
                $('.update-form input[name=tax_no]').removeAttr('required')
            }
        })

        $('select[name=who]').change(function (){
            if($(this).val() == 'admin'){
                $('.store-select').css('display','none')
            }else{
                $('.store-select').css('display','')
            }
        });
        $('select[name=department]').change(function (){
            $('.cfield').css('display','none')
            $('.cfield[data-did='+$(this).val()+']').css('display','')
        })
    </script>
@endsection
