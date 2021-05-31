@extends('layouts.app')

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
                                    <div
                                        class="intro-slide intro-slide1 banner banner-radius banner-fixed overlay-dark">
                                        <figure>
                                            <img src="images/demos/demo4/slides/1.jpg" width="580" height="510"
                                                 alt="banner" style="background-color: #232024;" />
                                        </figure>
                                        <div class="banner-content y-50">
                                            <h4 class="banner-subtitle font-weight-bold text-primary ls-1 slide-animate"
                                                data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'duration': '1s'
                                            }">New Arrivals</h4>
                                            <h3 class="banner-title text-white ls-s font-weight-bold slide-animate"
                                                data-animation-options="{
                                                'name': 'fadeInUpShorter',
                                                'delay': '.5s',
                                                'duration': '1s'
                                            }">Biometric<br>Fingerprints<br>Padlock</h3>
                                            <a href="demo4-shop.html" class="btn btn-link btn-underline btn-white slide-animate"
                                               data-animation-options="{
                                                'name': 'fadeInUpShorter',
                                                'delay': '1s',
                                                'duration': '1s'
                                            }">Shop now<i class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div
                                        class="intro-slide intro-slide1 banner banner-fixed banner-radius overlay-dark">
                                        <figure>
                                            <img src="images/demos/demo4/slides/2.jpg" width="580" height="510"
                                                 alt="banner" style="background-color: #efefef;" />
                                        </figure>
                                        <div class="banner-content y-50">
                                            <div class="slide-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter'
                                            }">
                                                <h4
                                                    class="banner-subtitle  font-weight-bold text-primary text-uppercase ls-1">
                                                    New Collection
                                                </h4>
                                                <h3 class="banner-title font-weight-bold mb-6 slide-animate"
                                                    data-animation-options="{
                                                    'name': 'fadeInRightShorter'
                                                }">Fashionable<br>partner</h3>
                                                <a class="btn btn-link btn-underline btn-dark" href="demo4-shop.html">Shop now<i
                                                        class="d-icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="grid-item col-md-6">
                            <div class="grid row">
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner1.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #836648;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For Men's</h3>
                                            <h5 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                                Starting at $29
                                            </h5>
                                            <hr class="banner-divider">
                                            <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner3.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #97928b;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">Fashions</h3>
                                            <h5 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                                            </h5>
                                            <hr class="banner-divider">
                                            <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner1.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #836648;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">For Men's</h3>
                                            <h5 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                                Starting at $29
                                            </h5>
                                            <hr class="banner-divider">
                                            <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>                                </div>
                                <div class="grid-item col-md-6 col-sm-6" style="height: 265px;">
                                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                                         data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                        <figure>
                                            <img src="images/demos/demo1/banners/banner3.jpg" alt="banner" width="380"
                                                 height="207" style="background-color: #97928b;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h3 class="banner-title text-white mb-1">Fashions</h3>
                                            <h5 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                                            </h5>
                                            <hr class="banner-divider">
                                            <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                                    class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>                                </div>
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
                <h2 class="title title-center mb-5">Best Sellers</h2>
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
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="images/demos/demo1/products/product1.jpg" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315" style="background-color: #f2f3f5;" />
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-new">new</label>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3cols.html">Clothing</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Solid pattern in fashion summer dress</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">$140.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product.html" class="rating-reviews">( 12 reviews )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="images/demos/demo1/products/product2.jpg" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315" style="background-color: #f2f3f5;" />
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">25% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3cols.html">Bags & Backpacks</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Mackintosh Poket backpack</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:60%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product.html" class="rating-reviews">( 8 reviews )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="images/demos/demo1/products/product3.jpg" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315" style="background-color: #f2f3f5;" />
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3cols.html">Clothing</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Fashionable Orginal Trucker</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">$78.64</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:40%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product.html" class="rating-reviews">( 2 reviews )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="images/demos/demo1/products/product4.jpg" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315" style="background-color: #f2f3f5;" />
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-new">New</label>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3cols.html">Clothing</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Women Red Fur Overcoat</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">$184.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product.html" class="rating-reviews">( 6 reviews )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="images/demos/demo1/products/product2.jpg" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315" style="background-color: #f2f3f5;" />
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">25% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3cols.html">Bags & Backpacks</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Mackintosh Poket backpack</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:60%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product.html" class="rating-reviews">( 8 reviews )</a>
                            </div>
                        </div>
                    </div>
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
