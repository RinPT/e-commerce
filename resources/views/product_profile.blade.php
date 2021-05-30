@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/default-skin/default-skin.min.css">

    	<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="/css/user/style.min.css">
@endsection

@section('content')
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="product product-single row mb-7">
                    <div class="col-md-6 sticky-sidebar-wrapper">
                        <div class="product-gallery pg-vertical sticky-sidebar"
                            data-sticky-options="{'minWidth': 767}">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{ App\Models\Product_images::find($product->id)->image }}"
                                        data-zoom-image="{{ App\Models\Product_images::find($product->id)->image }}"
                                        alt="Women's Brown Leather Backpacks" width="800" height="900">
                                </figure>
                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{ App\Models\Product_images::find($product->id)->image }}" alt="product thumbnail"
                                            width="109" height="122">
                                    </div>
                                </div>
                                <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-new">new</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <div class="product-navigation">
                                <ul class="breadcrumb breadcrumb-lg">
                                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                                    <li><a href="#" class="active">Products</a></li>
                                    <li>Detail</li>
                                </ul>

                                <ul class="product-nav">
                                    <li class="product-nav-prev">
                                        <a href="#">
                                            <i class="d-icon-arrow-left"></i> Prev
                                            <span class="product-nav-popup">
                                                <img src="/images/product/product-thumb-prev.jpg"
                                                    alt="product thumbnail" width="110" height="123">
                                                <span class="product-name">Sed egtas Dnte Comfort</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="product-nav-next">
                                        <a href="#">
                                            Next <i class="d-icon-arrow-right"></i>
                                            <span class="product-nav-popup">
                                                <img src="/images/product/product-thumb-next.jpg"
                                                    alt="product thumbnail" width="110" height="123">
                                                <span class="product-name">Sed egtas Dnte Comfort</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <h1 class="product-name">{{ $product->name }}</h1>
                            <div class="product-meta">
                                BRAND: <span class="product-brand">{{ App\Models\Store::find($product->store_id)->name }}</span>
                            </div>
                            <div class="product-price">{{ $product->price }}₺</div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:{{$avgstar*20}}%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">{{ App\Models\ProductComment::where('product_id','=', $product->id)->get()->count() }} reviews</a>
                            </div>
                            <p class="product-short-desc">{{ $product->description }}</p>
                            <div class="product-form product-variations product-color">
                                <label>Color:</label>
                                <div class="select-box">
                                    <select name="color" class="form-control">
                                        <option value="" selected="selected">Choose an Option</option>
                                        <option value="white">White</option>
                                        <option value="black">Black</option>
                                        <option value="brown">Brown</option>
                                        <option value="red">Red</option>
                                        <option value="green">Green</option>
                                        <option value="yellow">Yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product-form product-variations product-size">
                                <label>Size:</label>
                                <div class="product-form-group">
                                    <div class="select-box">
                                        <select name="size" class="form-control">
                                            <option value="" selected="selected">Choose an Option</option>
                                            <option value="s">Small</option>
                                            <option value="m">Medium</option>
                                            <option value="l">Large</option>
                                            <option value="xl">Extra Large</option>
                                        </select>
                                    </div>
                                    <a href="#" class="size-guide"><i class="d-icon-th-list"></i>Size Guide</a>
                                    <a href="#" class="product-variation-clean">Clean All</a>
                                </div>
                            </div>
                            <div class="product-variation-price">
                                <span>$239.00</span>
                            </div>

                            <hr class="product-divider">

                            <div class="product-form product-qty">
                                <div class="product-form-group">
                                    <div class="input-group mr-2">
                                        <button class="quantity-minus d-icon-minus"></button>
                                        <input class="quantity form-control" type="number" min="1" max="1000000">
                                        <button class="quantity-plus d-icon-plus"></button>
                                    </div>
                                    @auth
                                        <a href="{{ route('cart.add', $product->id) }}" class="btn-product text-light ls-normal font-weight-semi-bold">
                                            <i class="d-icon-bag"></i>
                                            Add to Cart
                                        </a>
                                    @endauth
                                    @guest
                                        <button class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold">
                                            <i class="d-icon-bag"></i>Add to Cart
                                        </button>
                                    @endguest
                                </div>
                            </div>

                            <hr class="product-divider mb-3">
                        </div>
                    </div>
                </div>

                <div class="tab tab-nav-simple product-tabs">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#product-tab-size-guide">Size Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-reviews">reviews {{ App\Models\ProductComment::where('product_id','=', $product->id)->get()->count() }} </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="product-tab-size-guide">
                            <figure class="size-image mt-4 mb-4">
                                <img src="/images/product/size_guide.png" alt="Size Guide Image" width="217"
                                    height="398">
                            </figure>
                            <figure class="size-table mt-4 mb-4">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST(IN.)</th>
                                            <th>WEIST(IN.)</th>
                                            <th>HIPS(IN.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>XS</th>
                                            <td>34-36</td>
                                            <td>27-29</td>
                                            <td>34.5-36.5</td>
                                        </tr>
                                        <tr>
                                            <th>S</th>
                                            <td>36-38</td>
                                            <td>29-31</td>
                                            <td>36.5-38.5</td>
                                        </tr>
                                        <tr>
                                            <th>M</th>
                                            <td>38-40</td>
                                            <td>31-33</td>
                                            <td>38.5-40.5</td>
                                        </tr>
                                        <tr>
                                            <th>L</th>
                                            <td>40-42</td>
                                            <td>33-36</td>
                                            <td>40.5-43.5</td>
                                        </tr>
                                        <tr>
                                            <th>XL</th>
                                            <td>42-45</td>
                                            <td>36-40</td>
                                            <td>43.5-47.5</td>
                                        </tr>
                                        <tr>
                                            <th>XXL</th>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </figure>
                        </div>
                        <div class="tab-pane " id="product-tab-reviews">
                            <div class="comments mb-8 pt-2 pb-2 border-no">
                                <ul>
                                    @foreach($comments as $comment)
                                    @if($product->id == $comment->product_id)
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="{{ $comment->photo }}" alt="avatar">
                                                </a>
                                            </figure>
                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:{{ $comment->product_rate*20 }}%"></span>
                                                        <span class="tooltiptext tooltip-top">{{ $comment->product_rate }}</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
                                                    <span class="comment-date text-body">{{$comment->created_at}}</span>
                                                    <h4><a href="#"></a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Comments -->
                            <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>

                                <form action="{{ route('product.store', $product->id) }}" method="POST">
                                @csrf
                                    <div class="rating-form">
                                        <label for="rating" class="text-dark">Your product rating * </label>
                                        <span class="rating-stars selected">
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>

                                        <select name="product_rate" id="rating" required="" style="display: none;">
                                            <option value="">Rate…</option>
                                            <option class="star-5" value="5">Perfect</option>
                                            <option class="star-4" value="4">Good</option>
                                            <option class="star-3" value="3">Average</option>
                                            <option class="star-2"value="2">Not that bad</option>
                                            <option class="star-1"value="1">Very poor</option>
                                        </select>
                                    </div>
                                    <textarea id="reply-message" name="comment" cols="30" rows="6" class="form-control mb-4"
                                        placeholder="Comment *" required></textarea>
                                    @guest
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <input type="text" class="form-control" id="reply-name"
                                                name="name" placeholder="Name *" required />
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <input type="email" class="form-control" id="reply-email"
                                                name="email" placeholder="Email *" required />
                                        </div>
                                    </div>
                                    <div class="form-checkbox mb-4">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                            name="signin-remember" required/>
                                        <label class="form-control-label" for="signin-remember">
                                            Save my name, email, and website in this browser for the next time I
                                            comment.
                                        </label>
                                    </div>
                                    @endguest
                                    <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Reply -->
                        </div>
                    </div>
                </div>

                <section class="pt-3 mt-10">
                    <h2 class="title justify-content-center">Related Products</h2>

                    <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
                        data-owl-options="{
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
                    @foreach($randoms as $random)
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="/photo/product/{{ $random->image }}" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">new</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="#addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a>
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-grid-3col.html">{{ $random->cname }}</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="product.html">{{ $random->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">{{ $random->price }}₺</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:{{ $random->product_rate*20 }}%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#" class="rating-reviews">( <span class="review-count"></span>
                                        {{ App\Models\ProductComment::where('product_id','=', $random->id)->get()->count() }} reviews
                                            )</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach    
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection

@section('javaScript')
    <script src="/vendor/sticky/sticky.min.js"></script>
    <script src="/vendor/photoswipe/photoswipe.min.js"></script>
	<script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
@endsection

