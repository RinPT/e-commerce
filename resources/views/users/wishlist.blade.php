@extends('layouts.app')

@section('stylesheet')
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="/css/user/style.min.css">
@endsection

@section('plugin-styles')
    <link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/nouislider/nouislider.min.css">
@endsection

@section('content')
<main class="main">
    <div class="page-header" style="background-color: #2466cc;height: 200px;">
        <h1 class="page-title">Wishlist</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
            <li class="delimiter">/</li>
            <li>Wishlist</li>
        </ul>
    </div>
    <div class="page-content pt-2 pb-10 mb-2">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                <p class="text-white mb-0"><b>Success! </b>{{ session()->get('success') }}</p>
            </div>
            @endif
            <table class="shop-table wishlist-table mt-2 mb-4">
                <thead>
                <tr>
                    <th class="product-name"><span>Product</span></th>
                    <th></th>
                    <th class="product-price"><span>Price</span></th>
                    <th class="product-stock-status"><span>Stock status</span></th>
                    <th class="product-remove"></th>
                </tr>
                </thead>
                <tbody class="wishlist-items-wrapper">
                @forelse($wishlist as $w)
                    <tr>
                        <td class="product-thumbnail">
                            <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$w->name)), 'id' => $w->id]) }}">
                                <figure>
                                    @if(empty($w->image))
                                    <img src="/photo/{{ $def_logo->value }}" width="100" height="100" alt="product">
                                    @else
                                        <img src="/photo/product/{{ $w->image }}" width="100" height="100" alt="product">
                                    @endif
                                </figure>
                            </a>
                        </td>
                        <td class="product-name">
                            <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$w->name)), 'id' => $w->id]) }}" target="_blank">
                                {{ $w->name }}
                            </a>
                        </td>
                        <td class="product-price">
                            <span class="amount">{{ $cookie_currency->prefix }}{{ $w->price }} {{ $cookie_currency->suffix }}</span>
                        </td>
                        <td class="product-stock-status">
                            @if($w->total_stock_count)
                                <label class="product-label " style="color: #ffffff;background: #41d02f;">In Stock</label>
                            @else
                                <label class="product-label " style="color: #ffffff;background: #e41f00;">Out of Stock</label>
                            @endif
                        </td>
                        <td class="product-remove">
                            <div>
                                <a href="{{ route('wishlist.destroy',['id' => $w->wid ]) }}" class="remove" title="Remove this product"><i class="fas fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">There is no product in wishlist.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
