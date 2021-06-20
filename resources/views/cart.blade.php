@extends('layouts.app')

@section('custom-css')
    <style>
        .remove-coupon{
            background: #000000;
            color: white !important;
            padding: 0;
            border-radius: 18px;
            height: 18px;
            width: 18px;
            display: inline-block;
            text-align: center;
            line-height: 19px;
            font-size: 10px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <main class="main cart">
        <div class="page-content pt-7 pb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step active"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container mt-7 mb-2">
                <div class="row">
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
                    <div class="col-lg-8 col-md-12 pr-lg-4">
                        <table class="shop-table cart-table">
                            <thead>
                            <tr>
                                <th><span>Product</span></th>
                                <th></th>
                                <th><span>Price</span></th>
                                <th><span>quantity</span></th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($pids = [])
                            @forelse($cart_products as $key => $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->product->name)), 'id' => $product->product->id]) }}">
                                            @if(isset($product->product->images[0]->image))
                                                @if(empty($product->product->images[0]->image))
                                                    <img src="/photo/{{ $def_logo }}" width="100" height="100" alt="product">
                                                @else
                                                    <img src="/photo/product/{{ $product->product->images[0]->image }}" width="100" height="100" alt="product">
                                                @endif
                                            @else
                                                <img src="/photo/{{ $def_logo }}" width="100" height="100" alt="product">
                                            @endif

                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->product->name)), 'id' => $product->product->id]) }}">
                                            {{ $product->product->name }}
                                        </a>
                                    </div>
                                    @if(count((array)$product->options))
                                    <span style="font-size: 12px;font-weight: 300;"><i class="fa fa-angle-double-right"></i> Options</span>
                                    @endif
                                    @foreach($product->options as $name => $val)
                                    <div class="text-capitalize ml-2" style="font-size: 11px;font-weight: 300;">
                                        <span>{{ $name }} :</span>
                                        <span>{{ $val }}</span>
                                    </div>
                                    @endforeach
                                </td>
                                <td class="product-subtotal">
                                    <div class="amount">{{ $cookie_currency->prefix }}{{ $product->product->price }} {{ $cookie_currency->suffix }}</div>
                                    @if(!in_array($product->product->id,$pids))
                                    <div class="amount-cargo" style="font-size: 11px" data-price="{{ $product->product->cargo_price }}">
                                        Cargo: {{ $cookie_currency->prefix }}{{ $product->product->cargo_price }} {{ $cookie_currency->suffix }}
                                    </div>
                                    @endif
                                </td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <button class="quantity-minus d-icon-minus"></button>
                                        <input class="quantity form-control" type="number" min="1" max="{{ $product->product->total_stock_count }}" value="{{ $product->count }}" data-val="{{ $product->count }}">
                                        <button class="quantity-plus d-icon-plus"></button>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount amount-single-total"
                                          data-price="{{ $product->product->price }}"
                                          data-id="{{ $key }}"
                                          data-total="{{ number_format($product->product->price * $product->count,2,".","") }}"
                                    >
                                        {{ $cookie_currency->prefix }}{{ number_format($product->product->price * $product->count,2,".","") }} {{ $cookie_currency->suffix }}
                                    </span>
                                </td>
                                <td class="product-close">
                                    <a href="{{ route('cart.destroy',['id' => $product->product->id]) }}" class="product-remove" data-key="{{ $key }}" title="Remove this product">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @php ($pids[] = $product->product->id)
                            @empty
                                <tr>
                                    <td colspan="5">There is no product in shopping cart.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="cart-actions mb-6 pt-4">
                            <a href="{{ route('home') }}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
                        </div>
                    </div>
                    <aside class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                            <div class="summary mb-4">
                                <h3 class="summary-title text-left">Cart Totals</h3>
                                <div style="border-bottom: 1px solid #e1e1e1;">
                                    <div class="d-flex mt-4">
                                        <span>Product Total</span>
                                        <span class="ml-auto font-weight-bold product-total"></span>
                                    </div>
                                    <div class="d-flex">
                                        <span>Cargo Total</span>
                                        <span class="ml-auto font-weight-bold cargo-total"></span>
                                    </div>
                                    <div class="mb-4">
                                        @foreach($used_coupones as $c)
                                            <div class="d-flex">
                                                <span>
                                                    <a class="remove-coupon" href="{{ route('coupon.delete',['code' => $c->id]) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    Coupon #{{ $c->code }}
                                                </span>
                                                <span class="ml-auto cp-code font-weight-bold" @if($c->rate > 0) data-rate="{{ $c->rate }}" @else data-price="{{ $c->price }}" @endif>-
                                                    @if($c->rate > 0)
                                                        {{ $c->rate."%" }}
                                                    @else
                                                        {{ $cookie_currency->prefix }} {{ $c->price }} {{ $cookie_currency->suffix }}
                                                    @endif
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="cart-coupon-box mb-8 mt-2">
                                    <h4 class="title coupon-title text-uppercase ls-m mb-0">Coupon Discount</h4>
                                    <form action="{{ route('coupon.apply') }}" method="post">
                                        @csrf
                                        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4"
                                               id="coupon_code" value="" placeholder="Enter coupon code here...">
                                        <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply Coupon</button>
                                    </form>
                                </div>
                                <table class="total">
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Total</h4>
                                        </td>
                                        <td>
                                            <p class="summary-total-price ls-s"></p>
                                        </td>
                                    </tr>
                                </table>
                                @if(count($cart_products) == 0)
                                    <a class="btn btn-dark btn-rounded btn-checkout" style="opacity: 0.5;cursor:not-allowed;">Proceed to checkout</a>
                                @else
                                    <a href="{{ route('checkout') }}" class="btn btn-dark btn-rounded btn-checkout">Proceed to checkout</a>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->

@endsection

@section('javaScript')
    <script>
        $('.quantity').keyup(function (){
            if($(this).val() == "" || $(this).val() == 0){
                $(this).val(1)
            }
            var last        = Number($(this).attr('data-val'))
            var cart        = Number($('.cart-count').html())
            var single      = $(this).parent().parent().next().find('.amount-single-total')
            var quantity    = Number($(this).val())
            single.attr('data-total',(single.data('price') * quantity).toFixed(2))
            single.html(currency.prefix+""+(single.data('price') * quantity).toFixed(2)+" "+currency.suffix)
            $(this).attr('data-val',quantity)
            $('.cart-count').html(cart + quantity - last)
            UpdateSingleProduct(single.data('id'),quantity)
            CalcTotal()
        })
        function CalcProductTotal(){
            $('.quantity-plus').click(function (){
                var single = $(this).parent().parent().next().find('.amount-single-total')
                var quantity = $(this).prev().val()
                single.attr('data-total',(single.data('price') * quantity).toFixed(2))
                single.html(currency.prefix+""+(single.data('price') * quantity).toFixed(2)+" "+currency.suffix)
                $('.cart-count').html(Number($('.cart-count').html())+1)
                UpdateSingleProduct(single.data('id'),quantity)
                CalcTotal()
            })
            $('.quantity-minus').click(function (){
                var single = $(this).parent().parent().next().find('.amount-single-total')
                var quantity = $(this).next().val()
                single.attr('data-total',(single.data('price') * quantity).toFixed(2))
                single.html(currency.prefix+""+(single.data('price') * quantity).toFixed(2)+" "+currency.suffix)
                $('.cart-count').html(Number($('.cart-count').html())-1)
                UpdateSingleProduct(single.data('id'),quantity)
                CalcTotal()
            })
        }

        function UpdateSingleProduct(id,count){
            $.ajax({
                method: "POST",
                url: "{{ route('cart.update') }}",
                data : {
                    id : id,
                    _token: "{{ csrf_token() }}",
                    count: count
                }
            }).done(function (data){

            }).fail(function (msg){
                console.log("An error occured.")
            })
        }
        function CalcTotal(){
            var total = 0
            $('.amount-single-total').each(function (){
                total += Number($(this).attr('data-total'))
            })
            $('.product-total').html(currency.prefix+""+total.toFixed(2)+" "+currency.suffix)
            $('.product-total').attr('data-price',total.toFixed(2))
            CalcGeneralTotal()
        }

        function CalcCargoTotal(){
            var total = 0
            $('.amount-cargo').each(function (){
                total += Number($(this).data('price'))
            })
            $('.cargo-total').html(currency.prefix+""+total.toFixed(2)+" "+currency.suffix)
            $('.cargo-total').attr('data-price',total.toFixed(2))
        }
        function CalcGeneralTotal(){
            var prod    = Number($('.product-total').attr('data-price'))

            $('.cp-code').each(function (){
                if(typeof $(this).data('rate') !== 'undefined'){
                    prod -= prod * $(this).data('rate') / 100
                }else{
                    prod -= $(this).data('price')
                }
            })
            var cargo   = Number($('.cargo-total').attr('data-price'))

            $('.summary-total-price').html(currency.prefix+""+(prod+cargo).toFixed(2)+" "+currency.suffix)
        }
        CalcProductTotal()
        CalcCargoTotal()
        CalcTotal()
        CalcGeneralTotal()
    </script>
@endsection
