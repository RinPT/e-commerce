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
    <main class="main order">
        <div class="page-content pt-7 pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step active"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container mt-8">
                <div class="order-message mr-auto ml-auto">
                    <div class="icon-box d-inline-flex align-items-center">
                        <div class="icon-box-icon mb-0">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                <g>
                                    <path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
                                        M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
                                        c0-0.7,0-1.4-0.1-2.1"></path>
                                        <polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
                                        48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
                                </g>
                            </svg>
                        </div>
                        <div class="icon-box-content text-left">
                            <h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
                            <p class="lh-1 ls-m">Your order has been received</p>
                        </div>
                    </div>
                </div>


                <div class="order-results">
                    <div class="overview-item">
                        <span> @if($oids>1)Order numbers @else Order number @endif:</span>
                        @foreach($oids as $oid)
                        <strong>#{{ $oid }}</strong>
                        @endforeach
                    </div>
                    <div class="overview-item">
                        <span>Status:</span>
                        <strong class="text-capitalize">{{ $status }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Date:</span>
                        <strong>{{ $date->format('d.m.Y H:i') }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Email:</span>
                        <strong>{{ $mail }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Total:</span>
                        <strong>{{ $curr->prefix }}{{ number_format($total,2,".","") }} {{ $curr->suffix }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Payment method:</span>
                        <strong class="text-capitalize">
                        @if($method == 'online')
                            Online Payment
                        @else
                            Cash On Delivery
                        @endif
                        </strong>
                    </div>
                </div>

                <h2 class="title title-simple text-left pt-4 font-weight-bold text-uppercase">Order Details</h2>
                <div class="order-details">
                    <table class="order-details-table">
                        <thead>
                            <tr class="summary-subtotal">
                                <td>
                                    <h3 class="summary-subtitle">Product</h3>
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($pids = [])
                            @foreach($products as $key => $product)
                            <tr>
                                <td class="product-name">{{ $product->product->name }} <span> <i class="fas fa-times"></i>
                                        {{ $product->count }}</span></td>
                                <td class="product-price">
                                    {{ $cookie_currency->prefix }}{{ number_format($product->product->price * $product->count,2,".","") }} {{ $cookie_currency->suffix }}
                                </td>
                            </tr>
                            @if(!in_array($product->pid,$pids))
                                <tr>
                                    <td class="product-name cargo-name">Cargo</td>
                                    <td class="product-total text-right" data-cargo-price="{{ $product->product->cargo_price }}">
                                        {{ $cookie_currency->prefix }}{{ $product->product->cargo_price }} {{ $cookie_currency->suffix }}                                                </td>
                                </tr>
                            @endif
                            @php ($pids[] = $product->product->id)
                            @endforeach

                            @foreach($coupons as $c)
                                <tr>
                                    <td class="product-name coupon-name">Coupon #{{ $c->code }}</td>
                                    <td class="product-total text-right" @if($c->rate > 0) data-d-rate="{{ $c->rate }}" @else data-d-price="{{ $c->price }}" @endif>-
                                        @if($c->rate > 0)
                                            {{ $c->rate."%" }}
                                        @else
                                            {{ $cookie_currency->prefix }} {{ $c->price }} {{ $cookie_currency->suffix }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="summary-subtotal">
                                <td>
                                    <h4 class="summary-subtitle">Total:</h4>
                                </td>
                                <td>
                                    <p class="summary-total-price">{{ $curr->prefix }}{{ number_format($total,2,".","") }} {{ $curr->suffix }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <a href="{{ route('cart') }}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4"><i class="d-icon-arrow-left"></i> Back to List</a>
                    </div>
                    <div class="col-md-4">
                        <h2 class="title title-simple text-left pt-10 mb-2">Delivery Address</h2>
                        <div class="address-info mb-6" style="line-height: 35px;">
                            <div class="address-detail pb-2">
                                <strong>{{ $delivery_address->name }} {{ $delivery_address->surname }}</strong><br>
                                <div style="max-width: 300px;">{{ $delivery_address->address }}</div>
                                {{ $delivery_address->city }}/{{ $delivery_address->country->name }}, {{ $delivery_address->postcode }}<br>
                                {{ $delivery_address->telephone }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="title title-simple text-left pt-10 mb-2">Billing Address</h2>
                        <div class="address-info mb-6" style="line-height: 35px;">
                            <div class="address-detail pb-2">
                                <strong>{{ $billing_address->name }} {{ $billing_address->surname }}</strong><br>
                                <div style="max-width: 300px;">{{ $billing_address->address }}</div>
                                {{ $billing_address->city }}/{{ $billing_address->country->name }}, {{ $billing_address->postcode }}<br>
                                {{ $billing_address->telephone }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('javaScript')

    <script src="vendor/sticky/sticky.min.js"></script>

@endsection
