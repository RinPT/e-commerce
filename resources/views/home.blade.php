@extends('layouts.app')

@section('plugin-styles')
    <link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/nouislider/nouislider.min.css">
@endsection

@section('content')
    <style>
        .grid .banner, .grid .category, .grid .category>a, .grid figure, .grid .banner img, .grid .category img {
            height: 100%;
        }
        .intro-slider .banner figure {
            height: 100%;
        }
        .intro-slider .banner-content {
            left: 8.3%;
        }
        .intro-slide1 .banner-title{
            font-size: 5rem;
            line-height: 1.2;
        }
        .product-media {
            min-height: 315px;
        }
    </style>
    <main class="main">
        <div class="page-content">
            <div class="container">
                <section class="intro-section">
                    <div class="grid row">
                        <div class="grid-item col-md-6" style="height: 530px;">
                            <div class="intro-slider owl-carousel owl-theme owl-full-height owl-dot-inner owl-dot-white owl-full-height row  animation-slider cols-1 gutter-no appear-animate"
                                     data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.3s'
                                }" data-owl-options="{
                                    'items': 1,
                                    'nav': false,
                                    'loop': true,
                                    'dots': true,
                                    'autoplay': false,
                                    'animateOut': 'fadeOutLeft'
                                }">
                                    @if ($sliders->count())
                                        @foreach ($sliders as $slider)
                                            <div class="intro-slide intro-slide1 banner banner-radius banner-fixed overlay-dark">
                                                <figure>
                                                    <img src="/photo/slider/{{ $slider->banner }}" width="580" height="510"
                                                        alt="banner" style="background-color: #232024;" />
                                                </figure>
                                                <div class="banner-content y-50">
                                                    <h4 class="banner-subtitle font-weight-bold text-primary ls-1 slide-animate"
                                                        data-animation-options="{
                                                        'name': 'fadeInRightShorter',
                                                        'duration': '1s'
                                                    }">{{ $slider->header }}</h4>
                                                    <h3 class="banner-title text-white ls-s font-weight-bold slide-animate"
                                                        data-animation-options="{
                                                        'name': 'fadeInUpShorter',
                                                        'delay': '.5s',
                                                        'duration': '1s'
                                                    }">{{ $slider->text }}</h3>
                                                    <a href="{{ $slider->btn_link }}" class="btn btn-link btn-underline btn-white slide-animate"
                                                    data-animation-options="{
                                                        'name': 'fadeInUpShorter',
                                                        'delay': '1s',
                                                        'duration': '1s'
                                                    }">{{ $slider->btn_text }}<i class="d-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        @endforeach

                                    @endif
                                </div>
                        </div>
                        <div class="grid-item col-md-6">
                            <div class="grid row">
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="/images/demos/demo1/banners/banner3.jpg" alt="banner" width="380" height="207" style="background-color: #836648;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For {{ $header_items[0]->name }}'s</h3>
                                            <hr class="banner-divider">
                                            <a href="{{ route('category.product.index',['name' => strtolower($header_items[0]->name)]) }}" class="btn btn-white btn-link btn-underline">
                                                Shop Now<i class="d-icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner2.jpg" alt="banner" width="380" height="207" style="background-color: #97928b;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For {{ $header_items[4]->name }}'s</h3>
                                            <hr class="banner-divider">
                                            <a href="{{ route('category.product.index',['name' => strtolower($header_items[4]->name)]) }}" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner2.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #836648;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For {{ $header_items[3]->name }}'s</h3>
                                            <hr class="banner-divider">
                                            <a href="{{ route('category.product.index',['name' => strtolower($header_items[3]->name)]) }}" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner1.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #97928b;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For {{ $header_items[1]->name }}'s</h3>
                                            <hr class="banner-divider">
                                            <a href="{{ route('category.product.index',['name' => strtolower($header_items[1]->name)]) }}" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="container mt-6 appear-animate">
                    <div class="service-list">
                        <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                                'items': 3,
                                'nav': false,
                                'dots': false,
                                'loop': true,
                                'autoplay': false,
                                'autoplayTimeout': 5000,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3,
                                        'loop': false
                                    }
                                }
                            }">
                            <div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.3s'
                                }">
                                <i class="icon-box-icon d-icon-truck"></i>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal lh-1">Free Shipping &amp;
                                        Return
                                    </h4>
                                    <p class="ls-s lh-1">Free shipping on orders over $99</p>
                                </div>
                            </div>

                            <div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.4s'
                                }">
                                <i class="icon-box-icon d-icon-service"></i>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal lh-1">Customer Support 24/7
                                    </h4>
                                    <p class="ls-s lh-1">Instant access to perfect support</p>
                                </div>
                            </div>

                            <div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.5s'
                                }">
                                <i class="icon-box-icon d-icon-secure"></i>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal lh-1">100% Secure Payment
                                    </h4>
                                    <p class="ls-s lh-1">We ensure secure payment!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>

            <section class="product-wrapper container appear-animate mt-6 mt-md-10 pt-4 pb-8" data-animation-options="{
                'delay': '.3s'
            }">
                <h2 class="title title-center mb-5">New Products</h2>
                <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
                    @foreach($products as $product)
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->name)), 'id' => $product->id]) }}">
                                @if(empty($product->image))
                                    <img src="/photo/{{ $def_logo->value }}" alt="product" width="280" height="315">
                                @else
                                    <img src="/photo/product/{{ $product->image }}" alt="product" width="280" height="315">
                                @endif
                            </a>
                            <div class="product-label-group">
                                @if($product->total_stock_count)
                                    <label class="product-label " style="color: #ffffff;background: #41d02f;">In Stock</label>
                                @else
                                    <label class="product-label " style="color: #ffffff;background: #e41f00;">Out of Stock</label>
                                @endif
                                @if($product->store_discount)
                                    <label class="product-label label-sale">{{ $product->store_discount }}% Store Off</label>
                                @endif
                                @if($product->main_discount)
                                    <label class="product-label label-stock">{{ $product->main_discount }}% Shop off</label>
                                @endif
                            </div>

                            <div class="product-action-vertical">
                            <!--
                                        @if($product->total_stock_count)
                                <a href="javascript:void(0)" class="btn-product-icon add-to-cart" data-id="{{ $product->id }}"><i class="d-icon-bag"></i></a>
                                        @endif
                                -->
                                <a @if(!auth()->check()) href="{{ route('login') }}" @else href="javascript:void(0)" @endif class="btn-product-icon add-to-wishlist" data-id="{{ $product->id }}" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->name)), 'id' => $product->id]) }}" class="btn-product" title="View">View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="{{ route('store.products',['name' => str_replace(' ','-',$product->store_name), 'id' => $product->store_id]) }}" target="_blank">
                                    {{ $product->store_name }}
                                </a>
                            </div>
                            <h3 class="product-name">
                                <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->name)), 'id' => $product->id]) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">{{ $cookie_currency->prefix }}{{ $product->price }} {{ $cookie_currency->suffix }}</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                            <span class="ratings"
                                                  style="width:{{ $product->product_review }}%">
                                            </span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->name)), 'id' => $product->id]) }}" class="rating-reviews">
                                    ( {{ $product->product_review_count }} reviews )
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <section class="mt-2 pb-6 pt-10 pb-md-10 appear-animate" data-animation-options="{
                'delay': '.3s'
            }">
                <h2 class="title d-none">Our Brand</h2>
                <div class="container">
                    <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                        data-owl-options="{
                        'nav': false,
                        'dots': false,
                        'autoplay': true,
                        'margin': 20,
                        'loop': true,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '576': {
                                'items': 3
                            },
                            '768': {
                                'items': 4
                            },
                            '992': {
                                'items': 5
                            },
                            '1200': {
                                'items': 6
                            }
                        }
                    }">
                        <figure><img src="images/brands/1.png" alt="brand" width="180" height="100" />
                        </figure>
                        <figure><img src="images/brands/2.png" alt="brand" width="180" height="100" />
                        </figure>
                        <figure><img src="images/brands/3.png" alt="brand" width="180" height="100" />
                        </figure>
                        <figure><img src="images/brands/4.png" alt="brand" width="180" height="100" />
                        </figure>
                        <figure><img src="images/brands/5.png" alt="brand" width="180" height="100" />
                        </figure>
                        <figure><img src="images/brands/6.png" alt="brand" width="180" height="100" />
                        </figure>
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection
