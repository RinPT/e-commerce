@extends('layouts.app')

@section('plugin-styles')
    <link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/default-skin/default-skin.min.css">
    <style>
        .add-to-cart{
            border: 0;
            flex: 1;
            min-width: 13rem;
            font-size: 1.4rem;
            border-radius: .3rem;
            background-color: #26c;
            color: #fff;
            cursor: pointer;
            max-width: 20.7rem;
            height: 4.5rem;
        }
    </style>
@endsection

@section('plugin-scripts')
    <!-- Plugins JS File -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/sticky/sticky.min.js"></script>
    <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
    <script src="/vendor/photoswipe/photoswipe.min.js"></script>
    <script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
@endsection

@section('javaScript')
    <script>
        $('.quantity-plus').click(function (){
            $('.variation-price').html($('.variation-price').data('prefix')+""+($('.variation-price').data('price')*$('.quantity').val()).toFixed(2)+" "+$('.variation-price').data('suffix'))
        })
        $('.quantity-minus').click(function (){
            $('.variation-price').html($('.variation-price').data('prefix')+""+($('.variation-price').data('price')*$('.quantity').val()).toFixed(2)+" "+$('.variation-price').data('suffix'))
        })
    </script>
    <script>
        $('.add-to-cart').click(function (){
            $.ajax({
                method: "POST",
                url: "{{ route('cart.add') }}",
                data : {
                    id : $(this).data('id'),
                    _token: "{{ csrf_token() }}",
                    count: $('.quantity').val()
                }
            }).done(function (data){
                $('.cart-count').html(data.count)
                $('.cart-prod-added').addClass('show');
                setTimeout(function (){
                    $('.cart-prod-added').removeClass('show');
                },'1500')
            }).fail(function (msg){
                alert("An error occured.")
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
                alert('An error occured.')
            })
        })
    </script>
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
                            @foreach($images as $image)
                            <figure class="product-image">
                                <img src="/photo/product/{{ $image->image }}"
                                     data-zoom-image="/photo/product/{{ $image->image }}"
                                     alt="{{ $product->name }}" width="800" height="900">
                            </figure>
                            @endforeach
                        </div>
                        <div class="product-thumbs-wrap">
                            <div class="product-thumbs">
                                @foreach($images as $image)
                                <div class="product-thumb @if($loop->first) active @endif">
                                    <img src="/photo/product/{{ $image->image }}" alt="product thumbnail"
                                         width="109" height="122">
                                </div>
                                @endforeach
                            </div>
                            <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                            <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <div class="product-label-group">
                            @if($product->store_discount)
                                <label class="product-label label-sale">{{ $product->store_discount }}% Store Off</label>
                            @endif
                            @if($product->main_discount)
                                <label class="product-label label-stock">{{ $product->main_discount }}% Shop off</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-name">{{ $product->name }}</h1>
                        <a href="{{ route('category.product.index',['name' => strtolower($category->name)]) }}" target="_blank">
                            <div class="product-meta">
                                Category: <span class="product-sku">{{ $category->name }}</span>
                            </div>
                        </a>
                        <div class="product-price">{{ $cookie_currency->prefix }}{{ $product->price }} {{ $cookie_currency->suffix }}</div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:{{ $product->product_review }}%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{ $product->product_review_count }} reviews )</a>
                        </div>
                        <p class="product-short-desc">
                            {{ $product->description }}
                        </p>
                        @foreach($options as $o)
                        <div class="product-form product-variations">
                            <label>{{ $o->name }}:</label>
                            <div class="select-box">
                                <select name="options[]" class="form-control">
                                    @foreach($o->options as $op)
                                    <option value="{{ $op->value }}">{{ $op->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach
                        <div class="variation-price fa-2x font-weight-bold" data-price="{{ $product->price }}" data-prefix="{{ $cookie_currency->prefix }}" data-suffix="{{ $cookie_currency->suffix }}">
                            {{ $cookie_currency->prefix }}{{ $product->price }} {{ $cookie_currency->suffix }}
                        </div>
                        <hr class="product-divider">

                        <div class="product-form product-qty">
                            <div class="product-form-group align-items-center">
                                <div class="input-group mr-2">
                                    <button class="quantity-minus d-icon-minus"></button>
                                    <input class="quantity form-control" type="number" min="1" max="1000000">
                                    <button class="quantity-plus d-icon-plus"></button>
                                </div>
                                <button class="btn-product add-to-cart text-normal ls-normal font-weight-semi-bold" data-id="{{ $product->id }}"><i class="d-icon-bag mr-2"></i>Add to Cart</button>
                                <a @if(!auth()->check()) href="{{ route('login') }}" @else href="javascript:void(0)" @endif class="mr-6 add-to-wishlist" data-id="{{ $product->id }}"><i class="d-icon-heart mr-2"></i>Add to Wishlist</a>
                            </div>
                        </div>

                        <hr class="product-divider mb-3">
                    </div>
                </div>
            </div>

            <div class="tab tab-nav-simple product-tabs">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#product-tab-description">Attributes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in" id="product-tab-description">
                        <div class="row mt-6">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                    @forelse($attributes as $attr)
                                    <tr>
                                        <th class="font-weight-semi-bold text-dark pl-0 text-capitalize">{{ $attr->name }}</th>
                                        <td class="pl-4">{{ $attr->value }}</td>
                                    </tr>
                                    @empty
                                        <div class="text-center">There is no attribute of this product.</div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="product-tab-reviews">
                        <div class="comments mb-8 pt-2 pb-2 border-no">
                            <ul>
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="images/blog/comments/1.jpg" alt="avatar">
                                            </a>
                                        </figure>
                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
														<span class="comment-date text-body">September 22, 2020 at 9:42
															pm</span>
                                                <h4><a href="#">John Doe</a></h4>
                                            </div>

                                            <div class="comment-content">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                    libero sodales leo,
                                                    eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                                                    Suspendisse potenti.
                                                    Sed egestas, ante et vulputate volutpat, eros pede semper
                                                    est, vitae luctus metus libero eu augue.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="images/blog/comments/2.jpg" alt="avatar">
                                            </a>
                                        </figure>

                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
														<span class="comment-date text-body">September 22, 2020 at 9:42
															pm</span>
                                                <h4><a href="#">John Doe</a></h4>
                                            </div>

                                            <div class="comment-content">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                    libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
                                                    mollis.
                                                    Ut justo. Suspendisse potenti. Sed egestas, ante et
                                                    vulputate volutpat,
                                                    eros pede semper est, vitae luctus metus libero eu augue.
                                                    Morbi purus libero,
                                                    faucibus adipiscing, commodo quis, avida id, est. Sed
                                                    lectus. Praesent elementum
                                                    hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                                    volutpat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Comments -->
                        <div class="reply">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <div class="rating-form">
                                <label for="rating" class="text-dark">Your rating * </label>
                                <span class="rating-stars selected">
											<a class="star-1" href="#">1</a>
											<a class="star-2" href="#">2</a>
											<a class="star-3" href="#">3</a>
											<a class="star-4 active" href="#">4</a>
											<a class="star-5" href="#">5</a>
										</span>

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>
                            <form action="#">
										<textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                                  placeholder="Comment *" required></textarea>
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <input type="text" class="form-control" id="reply-name"
                                               name="reply-name" placeholder="Name *" required />
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <input type="email" class="form-control" id="reply-email"
                                               name="reply-email" placeholder="Email *" required />
                                    </div>
                                </div>
                                <div class="form-checkbox mb-4">
                                    <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                           name="signin-remember" />
                                    <label class="form-control-label" for="signin-remember">
                                        Save my name, email, and website in this browser for the next time I
                                        comment.
                                    </label>
                                </div>
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
                    <div class="product">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="/images/product/featured1.jpg" alt="product" width="280" height="315">
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
                                <a href="shop-grid-3col.html">Clothing</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Solid Pattern in Summer Dress</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">$140.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">( <span class="review-count">12</span>
                                    reviews
                                    )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="/images/product/featured2.jpg" alt="product" width="280" height="315">
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-sale">27% off</label>
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
                                <a href="shop-grid-3col.html">Bags & Backpacks</a>
                            </div>
                            <h3 class="product-name">
                                <a href="product.html">Mackintosh Poket Backpack</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:60%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                    )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="/images/product/featured3.jpg" alt="product" width="280" height="315">
                            </a>
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
                                <a href="shop-grid-3col.html">Clothing</a>
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
                                <a href="#" class="rating-reviews">( <span class="review-count">2</span> reviews
                                    )</a>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="/images/product/featured4.jpg" alt="product" width="280" height="315">
                            </a>
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
                                <a href="shop-grid-3col.html">Clothing</a>
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
                                <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                    )</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
<!-- End Main -->
@endsection
