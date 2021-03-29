@extends('layouts.home')

@section('content')
    <main class="main">
        <div class="page-content">
            <section class="intro-section grey-section pt-4 pb-4">
                <div class="container">
                    <div class="row grid">
                        <div class="grid-item col-lg-6 height-x2 appear-animate" data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'delay': '.4s'
                        }">
                            <div class="intro-banner1 banner banner-fixed" style="background-color: #303338">
                                <figure>
                                    <img src="/images/demos/demo20/slides/1.jpg" alt="banner" width="580"
                                        height="510" />
                                </figure>
                                <div class="banner-content w-100">
                                    <h4 class="banner-subtitle mb-3 text-white text-uppercase font-weight-normal appear-animate"
                                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s'}">
                                        New Arrivals</h4>
                                    <h3 class="banner-title ls-m text-white text-uppercase font-weight-bold appear-animate"
                                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s', 'delay': '.3s'}">
                                        For men’s<br />Liftstyle</h3>
                                    <p class="font-primary ls-m appear-animate"
                                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s', 'delay':'.6s'}">
                                        Get Free Shipping on all<br />orders over $99.00</p>
                                    <a href="#" class="btn btn-outline btn-primary text-white appear-animate"
                                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s', 'delay':'.9s'}">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-lg-3 col-sm-6 height-x2 appear-animate" data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'delay': '.2s'
                        }">
                            <div class="intro-banner intro-banner2 banner banner-fixed overlay-dark"
                                style="background-color: #e3e2e7">
                                <figure>
                                    <img src="/images/demos/demo20/slides/2.jpg" alt="banner" width="280"
                                        height="510" />
                                </figure>
                                <div class="banner-content w-100 appear-animate">
                                    <h3 class="banner-title mb-2 ls-m font-weight-normal text-uppercase">
                                        <strong>Trending 2020</strong><br />Collection</h3>
                                    <p class="font-primary text-dark">Take advantage of our latest</p>
                                    <h4 class="banner-subtitle text-uppercase font-weight-bold"><strong
                                            class="text-primary mr-1 ls-l">20%</strong>off</h4>
                                    <a href="#" class="btn btn-outline btn-primary btn-sm">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-lg-3 col-sm-6 height-x1 appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.4s'
                        }">
                            <div class="intro-banner intro-banner3 banner banner-fixed overlay-dark"
                                style="background-color: #1c1c1c">
                                <figure>
                                    <img src="/images/demos/demo20/slides/3.jpg" alt="banner" width="280"
                                        height="245" />
                                </figure>
                                <div class="banner-content w-100 y-50 text-right appear-animate">
                                    <h4 class="banner-title ls-m text-uppercase font-weight-bold">Flash sale</h4>
                                    <h3 class="banner-subtitle mb-3 text-uppercase font-weight-normal text-white">
                                        Top Brands<br />Summer sunglases</h3>
                                    <a href="#" class="btn btn-outline btn-primary btn-sm text-white">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-lg-3 col-sm-6 height-x1 appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.3s'
                        }">
                            <div class="intro-banner intro-banner4 banner banner-fixed overlay-dark"
                                style="background-color: #2c579b">
                                <figure>
                                    <img src="/images/demos/demo20/slides/4.jpg" alt="banner" width="280"
                                        height="245" />
                                </figure>
                                <div class="banner-content w-100 y-50 appear-animate">
                                    <h4 class="banner-subtitle ls-s text-white font-weight-normal">Featured</h4>
                                    <h3 class="banner-title ls-s text-white">Classic Watch<br /><span
                                            class="font-weight-normal">Collection</span></h3>
                                    <a href="#" class="btn btn-solid btn-sm">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-space col-1"></div>
                    </div>
                </div>
            </section>
            <section class="product-wrapper container mt-10 pt-1 appear-animate">
                <div class="tab tab-nav-simple tab-nav-center">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab1-1">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab1-2">Best Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab1-3">Our Featured</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1-1">
                            <div class="owl-carousel owl-theme row owl-nav-full cols-xl-5 cols-lg-4 cols-md-3 cols-2"
                                data-owl-options="{
                                'items': 5,
                                'margin': 20,
                                'loop': false,
                                'nav': true,
                                'dots': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5
                                    }
                                }
                            }">
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/1.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Coast Pool Comfort Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/2.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">27% off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Hooded Coat</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/3.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Women's Fashion Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/4.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Padded Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/5.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Cavin Fashion Suede Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab1-2">
                            <div class="owl-carousel owl-theme row owl-nav-full cols-xl-5 cols-lg-4 cols-md-3 cols-2"
                                data-owl-options="{
                                'items': 5,
                                'margin': 20,
                                'loop': false,
                                'nav': true,
                                'dots': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5
                                    }
                                }
                            }">
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/1.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Coast Pool Comfort Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/3.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Women's Fashion Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/4.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Padded Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/2.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">27% off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Hooded Coat</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/5.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Cavin Fashion Suede Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab1-3">
                            <div class="owl-carousel owl-theme row owl-nav-full cols-xl-5 cols-lg-4 cols-md-3 cols-2"
                                data-owl-options="{
                                'items': 5,
                                'margin': 20,
                                'loop': false,
                                'nav': true,
                                'dots': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5
                                    }
                                }
                            }">
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/3.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Women's Fashion Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/4.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Padded Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/5.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Cavin Fashion Suede Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/1.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Coast Pool Comfort Jacket</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-classic">
                                    <figure class="product-media">
                                        <a href="demo20-product.html">
                                            <img src="/images/demos/demo20/products/2.jpg" alt="product" width="220"
                                                height="245">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">27% off</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">categories</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo20-product.html">Fashionable Hooded Coat</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart">add to cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                                    class="d-icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="categories container mt-10 pt-3 appear-animate">
                <h2 class="title">Shop by Categories</h2>
                <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-xs-2 cols-1" data-owl-options="{
                    'items': 4,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '480': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">
                    <div class="category category-default category-absolute appear-animate" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'delay': '.3s'
                    }">
                        <a href="#">
                            <figure class="category-media">
                                <img src="/images/demos/demo20/categories/1.jpg" alt="category" width="280"
                                    height="280">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name"><a href="demo20-shop.html">Accessories</a></h4>
                            <span class="category-count">
                                <span>35</span> Products
                            </span>
                        </div>
                    </div>
                    <div class="category category-default category-absolute appear-animate" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'delay': '.5s'
                    }">
                        <a href="#">
                            <figure class="category-media">
                                <img src="/images/demos/demo20/categories/2.jpg" alt="category" width="280"
                                    height="280">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name"><a href="demo20-shop.html">Bags &amp; Backpacks</a></h4>
                            <span class="category-count">
                                <span>35</span> Products
                            </span>
                        </div>
                    </div>
                    <div class="category category-default category-absolute appear-animate" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'delay': '.7s'
                    }">
                        <a href="#">
                            <figure class="category-media">
                                <img src="/images/demos/demo20/categories/3.jpg" alt="category" width="280"
                                    height="280">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name"><a href="demo20-shop.html">Sunglasses</a></h4>
                            <span class="category-count">
                                <span>35</span> Products
                            </span>
                        </div>
                    </div>
                    <div class="category category-default category-absolute appear-animate" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'delay': '.9s'
                    }">
                        <a href="#">
                            <figure class="category-media">
                                <img src="/images/demos/demo20/categories/4.jpg" alt="category" width="280"
                                    height="280">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name"><a href="demo20-shop.html">Shoes</a></h4>
                            <span class="category-count">
                                <span>35</span> Products
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-wrapper container mt-10 pt-3 mb-10 pb-4 appear-animate">
                <h2 class="title">Featured</h2>
                <div class="owl-carousel owl-theme row owl-nav-full cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                    'items': 4,
                    'margin': 20,
                    'loop': false,
                    'nav': true,
                    'dots': false,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">
                    <div class="product product-classic">
                        <figure class="product-media">
                            <a href="demo20-product.html">
                                <img src="/images/demos/demo20/products/6.jpg" alt="product" width="220"
                                    height="245">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3col.html">categories</a>
                            </div>
                            <h3 class="product-name">
                                <a href="demo20-product.html">Women's Fashion Hood</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart">add to cart</a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                        class="d-icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product product-classic">
                        <figure class="product-media">
                            <a href="demo20-product.html">
                                <img src="/images/demos/demo20/products/5.jpg" alt="product" width="220"
                                    height="245">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3col.html">categories</a>
                            </div>
                            <h3 class="product-name">
                                <a href="demo20-product.html">Cavin Fashion Suede Handbag</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart">add to cart</a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                        class="d-icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product product-classic">
                        <figure class="product-media">
                            <a href="demo20-product.html">
                                <img src="/images/demos/demo20/products/7.jpg" alt="product" width="220"
                                    height="245">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3col.html">categories</a>
                            </div>
                            <h3 class="product-name">
                                <a href="demo20-product.html">Converse Blue Training Shoes</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart">add to cart</a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                        class="d-icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product product-classic">
                        <figure class="product-media">
                            <a href="demo20-product.html">
                                <img src="/images/demos/demo20/products/8.jpg" alt="product" width="220"
                                    height="245">
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-new">new</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-grid-3col.html">categories</a>
                            </div>
                            <h3 class="product-name">
                                <a href="demo20-product.html">Beyond OTP Jacket</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart">add to cart</a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                        class="d-icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="banner parallax" data-image-src="/images/demos/demo20/parallax.jpg"
                style="background-color: #443633">
                <div class="container">
                    <div class="banner-content">
                        <div class="appear-animate" data-animation-options="{
                            'name': 'blurIn',
                            'delay': '.3s'
                        }">
                            <h4 class="banner-subtitle mb-1 font-secondary ls-l text-white font-weight-normal">Flash
                                Sale 50% Off</h4>
                            <h3 class="banner-title mb-5 ls-m text-white">Necessaries For Summer Season</h3>
                            <a href="#" class="btn btn-outline btn-primary text-white">Shop now</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container mt-10 pt-3 appear-animate">
                <h2 class="title">Testimonials</h2>
                <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                    'items': 3,
                    'nav': false,
                    'dots': true,
                    'loop': false,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '992': {
                            'items': 3,
                            'dots': false
                        }
                    }
                }">
                    <div class="testimonial appear-animate" data-animation-options="{
                        'name': 'fadeIn',
                        'delay': '.3s'
                    }">
                        <blockquote class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu
                            ante eget nisl convallis tempus Phsellus anctus, tincidunt tincidunt dui.</blockquote>
                        <div class="testimonial-info">
                            <figure class="testimonial-author-thumbnail">
                                <img src="/images/agents/1.jpg" alt="user" width="50" height="50" />
                            </figure>
                            <cite>
                                Herman Beck
                                <span>Investor</span>
                            </cite>
                        </div>
                    </div>
                    <div class="testimonial appear-animate" data-animation-options="{
                        'name': 'fadeIn',
                        'delay': '.5s'
                    }">
                        <blockquote class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu
                            ante eget nisl convallis tempus Phsellus anctus, tincidunt tincidunt dui.</blockquote>
                        <div class="testimonial-info">
                            <figure class="testimonial-author-thumbnail">
                                <img src="/images/agents/2.jpg" alt="user" width="50" height="50" />
                            </figure>
                            <cite>
                                Herman Beck
                                <span>Investor</span>
                            </cite>
                        </div>
                    </div>
                    <div class="testimonial appear-animate" data-animation-options="{
                        'name': 'fadeIn',
                        'delay': '.7s'
                    }">
                        <blockquote class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu
                            ante eget nisl convallis tempus Phsellus anctus, tincidunt tincidunt dui.</blockquote>
                        <div class="testimonial-info">
                            <figure class="testimonial-author-thumbnail">
                                <img src="/images/agents/3.jpg" alt="user" width="50" height="50" />
                            </figure>
                            <cite>
                                Herman Beck
                                <span>Investor</span>
                            </cite>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container mt-10 pt-4 mb-10 pb-4 appear-animate">
                <h2 class="title">Latest Blog</h2>
                <div class="owl-carousel owl-theme row cols-sm-2 cols-1" data-owl-options="{
                    'items': 2,
                    'nav': false,
                    'dots': true,
                    'loop': false,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2,
                            'dots': false
                        }
                    }
                }">
                    <div class="post post-list appear-animate" data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'delay': '.3s'
                    }">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="/images/demos/demo20/blog/1.jpg" width="280" height="206" alt="post" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">19</span>
                                <span class="post-month">JAN</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">20% Off Coupon for Cyber Week</a></h4>
                            <p class="post-content">Lorem ipsum dolor sit amet,onadipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua tempo...</p>
                            <a href="post-single.html" class="btn btn-outline btn-md btn-dark btn-icon-right">Read
                                More<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="post post-list appear-animate" data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'delay': '.5s'
                    }">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="/images/demos/demo20/blog/2.jpg" width="280" height="206" alt="post" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">19</span>
                                <span class="post-month">JAN</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">30% Discount for Shoes &amp; Bags</a>
                            </h4>
                            <p class="post-content">Lorem ipsum dolor sit amet,onadipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua tempo...</p>
                            <a href="post-single.html" class="btn btn-outline btn-md btn-dark btn-icon-right">Read
                                More<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
