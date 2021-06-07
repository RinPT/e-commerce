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
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <div class="page-content pt-10 pb-10 mb-2">
        <div class="container">
            <table class="shop-table wishlist-table mt-2 mb-4">
                <thead>
                <tr>
                    <th class="product-name"><span>Product</span></th>
                    <th></th>
                    <th class="product-price"><span>Price</span></th>
                    <th class="product-stock-status"><span>Stock status</span></th>
                    <th class="product-add-to-cart"></th>
                    <th class="product-remove"></th>
                </tr>
                </thead>
                <tbody class="wishlist-items-wrapper">
                @forelse($wishlist as $w)
                    <tr>
                        <td class="product-thumbnail">
                            <a href="product-simple.html">
                                <figure>
                                    <img src="images/products/product11.jpg" width="100" height="100"
                                         alt="product">
                                </figure>
                            </a>
                        </td>
                        <td class="product-name">
                            <a href="product-simple.html">Beige knitted elastic runner shoes</a>
                        </td>
                        <td class="product-price">
                            <span class="amount">$84.00</span>
                        </td>
                        <td class="product-stock-status">
                            <span class="wishlist-in-stock">In Stock</span>
                        </td>
                        <td class="product-add-to-cart">
                            <a href="product.html" class="btn-product btn-primary"><span>Select options</span></a>
                        </td>
                        <td class="product-remove">
                            <div>
                                <a href="#" class="remove" title="Remove this product"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    yok user
                @endforelse
                </tbody>
            </table>
            <div class="social-links share-on">
                <h5 class="text-uppercase font-weight-bold mb-0 mr-4 ls-s">Share on:</h5>
                <a href="#" class="social-link social-icon social-facebook" target="_blank"
                   title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link social-icon social-twitter" target="_blank"
                   title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link social-icon social-pinterest" target="_blank"
                   title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                <a href="#" class="social-link social-icon social-email" target="_blank"
                   title="Email"><i class="far fa-envelope"></i></a>
                <a href="#" class="social-link social-icon social-whatsapp" target="_blank"
                   title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</main>
@endsection
