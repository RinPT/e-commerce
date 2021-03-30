@extends('layouts.app')

@section('content')
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </nav>
        <div class="page-content pb-10 mb-3">
            <div class="container">
                <div class="row gutter-lg main-content-wrap">
                    <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">All Categories</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="#">Accessosries</a></li>
                                        <li>
                                            <a href="#">Bags</a>
                                            <ul style="display: block">
                                                <li><a href="#">Backpacks & Fashion Bags</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Electronics</a>
                                            <ul>
                                                <li><a href="#">Computer</a></li>
                                                <li><a href="#">Gaming & Accessosries</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">For Fitness</a></li>
                                        <li><a href="#">Home & Kitchen</a></li>
                                        <li><a href="#">Men's</a></li>
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Sporting Goods</a></li>
                                        <li><a href="#">Summer Season's</a></li>
                                        <li><a href="#">Travel & Clothing</a></li>
                                        <li><a href="#">Watches</a></li>
                                        <li><a href="#">Women’s</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Filter by Price</h3>
                                    <div class="widget-body mt-3">
                                        <form action="#">
                                            <div class="filter-price-slider"></div>

                                            <div class="filter-actions">
                                                <div class="filter-price-text mb-4">Price:
                                                    <span class="filter-price-range"></span>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-dark btn-filter btn-rounded">Filter</button>
                                            </div>
                                        </form><!-- End Filter Price Form -->
                                    </div>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Size</h3>
                                    <ul class="widget-body filter-items">
                                        <li><a href="#">Extra Large</a></li>
                                        <li><a href="#">Large</a></li>
                                        <li><a href="#">Medium</a></li>
                                        <li><a href="#">Small</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Color</h3>
                                    <ul class="widget-body filter-items">
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">White</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Brands</h3>
                                    <ul class="widget-body filter-items">
                                        <li><a href="#">Cinderella</a></li>
                                        <li><a href="#">Comedy</a></li>
                                        <li><a href="#">Rightcheck</a></li>
                                        <li><a href="#">SkillStar</a></li>
                                        <li><a href="#">SLS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 main-content">
                        <div class="shop-banner-default banner mb-1"
                            style="background-image: url('images/shop/banner.jpg'); background-color: #4e6582;">
                            <div class="banner-content">
                                <h4 class="banner-subtitle font-weight-bold ls-normal text-uppercase text-white">
                                    Riode Shop</h4>
                                <h1 class="banner-title font-weight-bold text-white">Banner with Sidebar</h1>
                                <a href="#" class="btn btn-white btn-outline btn-icon-right btn-rounded text-normal">Discover
                                    now<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default">Default</option>
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Average rating</option>
                                        <option value="date">Latest</option>
                                        <option value="price-low">Sort forward price low</option>
                                        <option value="price-high">Sort forward price high</option>
                                        <option value="">Clear custom sort</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box text-dark">
                                    <label>Show :</label>
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="shop-list.html" class="d-icon-mode-list btn-layout"></a>
                                    <a href="shop.html" class="d-icon-mode-grid btn-layout active"></a>
                                </div>
                            </div>
                        </nav>
                        <div class="row cols-2 cols-sm-3 product-wrapper">
                            @if ($products->count())
                                @foreach ($products as $product)
                                    <div class="product-wrap">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="images/shop/7.jpg" alt="product" width="280" height="315">
                                                </a>
                                                <div class="product-label-group">
                                                    <label class="product-label label-new">new</label>
                                                </div>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                        data-target="#addCartModal" title="Add to cart"><i
                                                            class="d-icon-bag"></i></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                </div>
                                                <!--<div class="product-action">
                                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                        View</a>
                                                </div>-->
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="shop-grid-3col.html">Shoes</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{ route('product', $product) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <span class="price">{{ $product->price }}₺</span>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="product.html" class="rating-reviews">( 11 reviews )</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <hr/>
                        <!--<nav class="toolbox toolbox-pagination">
                            <p class="show-info">Showing 12 of 56 Products</p>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                        aria-disabled="true">
                                        <i class="d-icon-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next<i class="d-icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
