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

@section('plugin-scripts')
    <script src="/vendor/nouislider/nouislider.min.js"></script>
    <script>
        $('.add-to-cart').click(function (){
            $.ajax({
                method: "POST",
                url: "{{ route('cart.add') }}",
                data : {
                    id : $(this).data('id'),
                    _token: "{{ csrf_token() }}",
                    count: 1
                }
            }).done(function (data){
                $('.cart-count').html(data.count)
                $('.cart-prod-added').addClass('show');
                setTimeout(function (){
                    $('.cart-prod-added').removeClass('show');
                },'1500')
            }).fail(function (msg){
                console.log("An error occured.")
            })
        })

        $('.add-to-wishlist').click(function (){
            $.ajax({
                method: "POST",
                url: "{{ route('wishlist.add') }}",
                data : {
                    id : $(this).data('id'),
                    _token: "{{ csrf_token() }}"
                }
            }).done(function (data){
                $('.wishlist-added').addClass('show');
                setTimeout(function (){
                    $('.wishlist-added').removeClass('show');
                },'1500')
            }).fail(function (msg){
                console.log("An error occured.")
            })
        })
    </script>
@endsection

@section('content')
    <main class="main">
        <div class="page-header"
             style="background-image: url('/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
            <h1 class="page-title">{{ $store->name }}</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li class="delimiter">/</li>
                <li>Visit Store</li>
            </ul>
        </div>
        <!-- End PageHeader -->
        <div class="page-content mb-10 pb-3">
            <div class="container">
                <div class="row main-content-wrap gutter-lg">
                    <aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Filter by Price</h3>
                                    <div class="widget-body mt-3">
                                        <form action="@if(!empty($QS))?{{ $QS }}@endif" method="get">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <label class="pr-2">Min</label>
                                                        <input type="number" name="min" min="0" class="form-control pl-1 pr-1 mr-1" value="0" step="0.01">
                                                        -
                                                    </div>
                                                </div>
                                                <div class="col-6 pl-0">
                                                    <div class="d-flex align-items-center">
                                                        <label class="pr-2">Max</label>
                                                        <input type="number" name="max" class="form-control mr-1 pl-1 pr-1" value="{{ $max_price }}" step="0.01">
                                                        {{ $cookie_currency->code }}
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-filter btn-rounded mt-3">FILTER</button>
                                        </form><!-- End Filter Price Form -->
                                    </div>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Filter by Rating</h3>

                                    <ul class="widget-body filter-items">
                                        <form action="@if(!empty($QS))?{{ $QS }}@endif" method="get">
                                            <div class="mb-2" style="border-bottom: 1px solid #eee;">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="rev1" name="review" value="1" @if(in_array(1,$rev_nums)) checked @endif>
                                                    <label class="form-control-label mb-2" for="rev1">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:20%"></span>
                                                                <span class="tooltiptext tooltip-top">1</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-2" style="border-bottom: 1px solid #eee;">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="rev2" name="review" value="2" @if(in_array(2,$rev_nums)) checked @endif>
                                                    <label class="form-control-label mb-2" for="rev2">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:40%"></span>
                                                                <span class="tooltiptext tooltip-top">2</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-2" style="border-bottom: 1px solid #eee;">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="rev3" name="review" value="3" @if(in_array(3,$rev_nums)) checked @endif>
                                                    <label class="form-control-label mb-2" for="rev3">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:60%"></span>
                                                                <span class="tooltiptext tooltip-top">3</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-2" style="border-bottom: 1px solid #eee;">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="rev4" name="review" value="4" @if(in_array(4,$rev_nums)) checked @endif>
                                                    <label class="form-control-label mb-2" for="rev4">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:80%"></span>
                                                                <span class="tooltiptext tooltip-top">4</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="rev5" name="review" value="5" @if(in_array(5,$rev_nums)) checked @endif>
                                                    <label class="form-control-label mb-2" for="rev5">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:100%"></span>
                                                                <span class="tooltiptext tooltip-top">5</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-filter btn-rounded mt-2">FILTER</button>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 main-content">
                        <div class="row cols-2 cols-sm-3 product-wrapper mt-8">
                            @foreach($products as $product)
                                <div class="product-wrap">
                                    <div class="product">
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
                                                @if($product->total_stock_count)
                                                    <a href="javascript:void(0)" class="btn-product-icon add-to-cart" data-id="{{ $product->id }}"><i class="d-icon-bag"></i></a>
                                                @endif
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
                                </div>
                            @endforeach
                        </div>
                        <nav class="toolbox toolbox-pagination">
                            <p class="show-info">Showing <span>{{ $products->count() }} of {{ count($products) }}</span> Products</p>
                            <ul class="pagination">
                                <li class="page-item @if($products->onFirstPage()) disabled @endif">
                                    <a class="page-link page-link-prev" @if(!$products->onFirstPage()) href="{{ $products->previousPageUrl() }}" @endif aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <i class="d-icon-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item @if(!$products->hasMorePages()) disabled @endif">
                                    <a class="page-link page-link-next" @if($products->hasMorePages()) href="{{ $products->nextPageUrl() }}" @endif aria-label="Next">
                                        Next<i class="d-icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection
