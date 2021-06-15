@extends('layouts.app')

@section('custom-css')

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
        .delivery-address,.billing-address {
            border: 2px solid #dee2e6!important;
            padding: 20px;
            cursor: pointer;
        }
        .delivery-address.active,.billing-address.active {
            border: 2px solid #2466cc!important;
        }
    </style>
@endsection


@section('content')
    <main class="main checkout">
        <div class="page-content pt-7 pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step active"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="order.html">3. Order Complete</a></h3>
            </div>
            <div class="container mt-7">
                <form action="#" class="form">
                    <div class="row">
                        <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                            @if(count($addresses))
                                <input type="hidden" name="delivery_id" value="{{ $addresses[0]->id }}">
                                <input type="hidden" name="billing_id" value="{{ $addresses[0]->id }}">
                                <div class="row">
                                    <h2 class="title title-simple text-uppercase text-left">Delivery Address</h2>
                                    @foreach ($addresses as $key => $address)
                                        <div class="col-sm-4">
                                            <div class="card card-address delivery-address @if($key == 0) active @endif" data-id="{{ $address->id }}">
                                                <div class="card-body border p-4 rounded mb-0 p-0">
                                                    <h6 class="mb-1">{{ $address->address_type }} <span class="text-capitalize">({{ $address->user_type }})</span></h6>
                                                    <hr/>
                                                    <p class="mb-0 fs-12">
                                                        <strong>{{ $address->name }} {{ $address->surname }}</strong><br>
                                                        {{ $address->address }}<br>
                                                        {{ $address->city }}<br>
                                                        {{ $address->postcode }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row mt-4">
                                    <h2 class="title title-simple text-uppercase text-left">Billing Address</h2>
                                    @foreach ($addresses as $key => $address)
                                        <div class="col-sm-4 mb-4">
                                            <div class="card card-address billing-address @if($key == 0) active @endif" data-id="{{ $address->id }}">
                                                <div class="card-body border p-4 rounded mb-0 p-0">
                                                    <h6 class="mb-1">{{ $address->address_type }} <span class="text-capitalize">({{ $address->user_type }})</span></h6>
                                                    <hr/>
                                                    <p class="mb-0 fs-12">
                                                        <strong>{{ $address->name }} {{ $address->surname }}</strong><br>
                                                        {{ $address->address }}<br>
                                                        {{ $address->city }}<br>
                                                        {{ $address->postcode }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                                <div class="payment accordion radio-type" style="border-bottom: 0;">
                                    <h2 class="title title-simple text-uppercase text-left">Payment Methods</h2>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1" class="collapse text-body text-normal ls-m">Check payments
                                            </a>
                                        </div>
                                        <div id="collapse1" class="expanded" style="display: block;">
                                            <div class="card-body ls-m">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2" class="expand text-body text-normal ls-m">Cash on delivery</a>
                                        </div>
                                        <div id="collapse2" class="collapsed">
                                            <div class="card-body ls-m">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                            <label>Order Notes (Optional)</label>
                            <textarea class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                                      placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                        <aside class="col-lg-5 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                                <div class="summary pt-5">
                                    <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                    <table class="order-table">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php ($pids = [])
                                        @forelse($cart_products as $key => $product)
                                        <tr>
                                            <td class="product-name pb-0">{{ $product->product->name }} <span class="product-quantity">×&nbsp;{{ $product->count }}</span></td>
                                            <td class="product-total text-body pb-0" data-price="{{ number_format($product->product->price * $product->count,2,".","") }}">
                                                {{ $cookie_currency->prefix }}{{ number_format($product->product->price * $product->count,2,".","") }} {{ $cookie_currency->suffix }}
                                            </td>
                                        </tr>
                                        @if(!in_array($product->product->id,$pids))
                                            <tr>
                                                <td class="cargo-name pb-0" style="color: #666;">Cargo</td>
                                                <td class="product-total text-body pb-0" data-cargo-price="{{ $product->product->cargo_price }}">
                                                    {{ $cookie_currency->prefix }}{{ $product->product->cargo_price }} {{ $cookie_currency->suffix }}                                                </td>
                                            </tr>
                                        @endif
                                        @php ($pids[] = $product->product->id)
                                        @empty
                                            <tr>
                                                <td class="product-name" colspan="2">
                                                    There is no product
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    @if(count($used_coupones))
                                    <table class="order-table mt-2">
                                        <thead>
                                        <tr>
                                            <th>Coupon</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($used_coupones as $c)
                                            <tr>
                                                <td class="coupon-name" style="color: #666;">Coupon #{{ $c->code }}</td>
                                                <td class="product-total text-body" @if($c->rate > 0) data-d-rate="{{ $c->rate }}" @else data-d-price="{{ $c->price }}" @endif>-
                                                    @if($c->rate > 0)
                                                        {{ $c->rate."%" }}
                                                    @else
                                                        {{ $cookie_currency->prefix }} {{ $c->price }} {{ $cookie_currency->suffix }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="product-name" colspan="2">
                                                    There is no product
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    @endif
                                    <table>
                                        <tr class="summary-total">
                                            <td class="pb-0">
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td class=" pt-0 pb-0">
                                                <p class="summary-total-price ls-s text-primary">$290.00</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-checkbox mt-4 mb-5">
                                        <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                               name="terms-condition" required />
                                        <label class="form-control-label" for="terms-condition">
                                            I have read and agree to the website <a href="{{ route('purchase.index') }}" target="_blank">terms and conditions </a>*
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-order">Place Order</button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection


@section('javaScript')
    <script src="/vendor/sticky/sticky.min.js"></script>
    <script>
        $('.delivery-address').click(function (){
            $('.delivery-address').each(function (){
                $(this).removeClass('active')
            })
            $('input[name=delivery_id]').val($(this).data('id'))
            $(this).addClass('active')
        })

        $('.billing-address').click(function (){
            $('.billing-address').each(function (){
                $(this).removeClass('active')
            })
            $('input[name=billing_id]').val($(this).data('id'))
            $(this).addClass('active')
        })


        function CalcTotal(){
            var total = 0
            $('[data-price]').each(function (){
                total += Number($(this).data('price'))
            })
            $('[data-d-rate]').each(function (){
                total -= Number(total * $(this).data('d-rate') / 100)
            })
            $('[data-d-price]').each(function (){
                total -= Number($(this).data('d-price'))
            })
            $('[data-cargo-price]').each(function (){
                total += Number($(this).data('cargo-price'))
            })
            $('.summary-total-price').html(currency.prefix+""+Number(total).toFixed(2)+" "+currency.suffix)
        }
        CalcTotal()
    </script>
@endsection
