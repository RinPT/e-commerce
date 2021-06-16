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
        .card-box {
            border: 2px dashed #e1e1e1;
            padding: 25px;
            margin-top: 10px;
        }
    </style>
@endsection


@section('content')
    <main class="main checkout">
        <div class="page-content pt-7 pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step active"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container mt-7">
                <form action="{{ route('3dsecure') }}" class="form" method="post">
                    @csrf
                    <input type="hidden" name="ptype" value="online">
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
                                            <a href="#collapse1" class="collapse text-body text-normal ls-m p-method" data-name="online">Online Payment</a>
                                        </div>
                                        <div id="collapse1" class="expanded" style="display: block;">
                                            <div class="card-body ls-m">
                                                <div class="card-box">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-12">
                                                            <label for="credit-cart">Card Number</label>
                                                            <input type="text" name="credit-cart" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="credit-cart">Expiration Date</label>
                                                            <select class="form-control" name="month">
                                                                @foreach (range(1, 12) as $item)
                                                                    <option value="{{ $item }}">@if($item <10){{ "0".$item }}@else{{ $item }}@endif</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="year">
                                                                @foreach (range(date('Y'), date('Y')+78) as $item)
                                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="credit-cart">CVV</label>
                                                            <input type="text" name="cvv" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2" class="expand text-body text-normal ls-m p-method" data-name="cash">Cash on delivery</a>
                                        </div>
                                        <div id="collapse2" class="collapsed">
                                            <div class="card-body ls-m">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <p class="summary-total-price ls-s text-primary"></p>
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
                                    <button type="submit" class="btn btn-dark btn-rounded btn-order">Payment</button>
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
        let CompleteRoute = "{{ route('order.complete')  }}"
        let PaymentRoute  = "{{ route('3dsecure') }}"

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
        $('.p-method').click(function (){
            $('input[name=ptype]').val($(this).data('name'))
            if($(this).data('name') == 'online'){
                $('form').attr('action',PaymentRoute)
                $('.btn-order').html('Payment')
            }else {
                $('form').attr('action',CompleteRoute)
                $('.btn-order').html('Place Order')
            }
        })
    </script>
@endsection

