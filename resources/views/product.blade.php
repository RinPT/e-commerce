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

        .ar-button{
            border: 0;
            flex: 1;
            min-width: 13rem;
            font-size: 1.4rem;
            border-radius: .3rem;
            background-color: #d26e4b;
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
        $('.product_rate_star').children().click(function (){
            $('input[name=product_rate]').val($(this).html())
        })
        $('.cargo_rate_star').children().click(function (){
            $('input[name=cargo_rate]').val($(this).html())
        })
    </script>
    <script>
        $('.add-to-cart').click(function (){
            var p_options = {};
            $('.select-options').each(function (i,v){
                p_options[$(this).data('name')] = $(this).children("option:selected").val()
            })
            $.ajax({
                method: "POST",
                url: "{{ route('cart.add') }}",
                data : {
                    id : $(this).data('id'),
                    _token: "{{ csrf_token() }}",
                    count: $('.quantity').val(),
                    optss : JSON.stringify(p_options)
                }
            }).done(function (data){
                console.log(data)
                $('.cart-count').html(data.count)
                $('.cart-prod-added').addClass('show');
                setTimeout(function (){
                    $('.cart-prod-added').removeClass('show');
                },'1500')
            }).fail(function (msg){
                console.log("An error occured.")
                console.log(msg)
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
                console.log('An error occured.')
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
                            @forelse($images as $image)
                            <figure class="product-image">
                                <img src="/photo/product/{{ $image->image }}"
                                     data-zoom-image="/photo/product/{{ $image->image }}"
                                     alt="{{ $product->name }}" width="800" height="900">
                            </figure>
                            @empty
                                <figure class="product-image">
                                    <img src="/photo/{{ $def_logo->value }}"
                                         data-zoom-image="/photo/{{ $def_logo->value }}"
                                         alt="{{ $def_logo->value }}" width="800" height="900">
                                </figure>
                            @endforelse
                        </div>
                        <div class="product-thumbs-wrap">
                            <div class="product-thumbs">
                                @forelse($images as $image)
                                    <div class="product-thumb @if($loop->first) active @endif">
                                        <img src="/photo/product/{{ $image->image }}" alt="product thumbnail" width="109" height="122">
                                    </div>
                                @empty
                                    <div class="product-thumb active">
                                        <img src="/photo/{{ $def_logo->value }}" alt="product thumbnail" width="109" height="122">
                                    </div>
                                @endforelse
                            </div>
                            <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                            <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                        </div>
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
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-name">{{ $product->name }}</h1>
                        <a href="#">
                            <div class="product-meta">
                                Category: <a class="product-sku" href="{{ route('category.product.index',['name' => strtolower($category->name)]) }}" target="_blank">{{ $category->name }}</a>
                                <span class="ml-3">
                                    Store: <a class="product-sku" href="{{ route('store.products',['name' => str_replace(' ','-',$product->store_name), 'id' => $product->store_id]) }}" target="_blank">
                                    {{ $product->store_name }}
                                </a>
                                </span>
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
                                <select name="options[]" class="form-control text-capitalize select-options" data-name="{{ $o->name }}">
                                    @foreach($o->options as $op)
                                    <option value="{{ $op->value }}" @if(!in_array($op->value,$in_stocks) && $op->is_stock_value) disabled @endif>{{ $op->value }}</option>
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
                                    <input class="quantity form-control" type="number" min="1" max="{{ $product->total_stock_count }}">
                                    <button class="quantity-plus d-icon-plus"></button>
                                </div>
                                <button class="btn-product add-to-cart text-normal ls-normal font-weight-semi-bold" data-id="{{ $product->id }}" @if(!$product->total_stock_count) disabled style="opacity: 0.5;" @endif><i class="d-icon-bag mr-2"></i>Add to Cart</button>
                                @if( !empty($product->ar))
                                <div>
                                    <a rel="ar" href="{{ $product->ar }}">
                                        <button class=" ar-button text-normal ls-normal font-weight-semi-bold"><i class="d-icon-mobile mr-2"></i>AR View</button>
                                    </a>
                                </div>
                                @endif
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
                        <a class="nav-link" href="#product-tab-reviews">Reviews ({{ count($reviews) }})</a>
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
                                @forelse($reviews as $r)
                                <li class="ml-0" style="border-bottom: 1px solid #f3f3f3;">
                                    <div class="comment">
                                        <div class="comment-body pt-0 mb-5">
                                            <div class="comment-rating ratings-container flex-column mb-0" style="top:0">
                                                <span class="mb-2">Product Rate</span>
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:{{ $r->product_rate * 20 }}%"></span>
                                                    <span class="tooltiptext tooltip-top">{{ $r->product_rate }}</span>
                                                </div>
                                            </div>
                                            <div class="comment-rating ratings-container flex-column mb-0" style="top: 5rem;">
                                                <span class="mb-2">Cargo Rate</span>
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:{{ $r->cargo_rate * 20 }}%"></span>
                                                    <span class="tooltiptext tooltip-top">{{ $r->cargo_rate }}</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
                                                <span class="comment-date text-body mb-2">{{ $r->created_at->format('d.m.Y H:i') }}</span>
                                                <h4>
                                                    <a>{{ $r->name }} {{ $r->surname }}</a>
                                                </h4>
                                            </div>

                                            <div class="comment-content">
                                                <p>
                                                    {{ $r->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    There is no review of this product.
                                @endforelse
                            </ul>
                        </div>
                        <!-- End Comments -->
                        @if(auth()->check())
                        <div class="reply">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success mt-3">
                                    <p class="mb-0 text-white">{{ session()->get('success') }}</p>
                                </div>
                            @endif
                            <form action="{{ route('product.review.add',['product_id' => $product->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="product_rate" value="0">
                                <input type="hidden" name="cargo_rate" value="0">
                                <div class="rating-form mt-2">
                                    <label for="rating" class="text-dark">Product Rate * </label>
                                    <span class="rating-stars product_rate_star">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>
                                    <label for="rating" class="text-dark ml-3">Cargo Rate * </label>
                                    <span class="rating-stars cargo_rate_star">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>
                                </div>

                                <textarea name="comment" id="reply-message" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required></textarea>
                                <button type="submit" class="btn btn-primary btn-rounded">Submit<i class="d-icon-arrow-right"></i></button>
                            </form>
                        </div>
                        <!-- End Reply -->
                        @else
                            <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                </div>
                                <p class="mb-0 mt-3" style="font-size: 15px;opacity: 0.6;">
                                    You need to <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register </a>to add a review...
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(count($rel_products))
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
                    @foreach($rel_products as $product)
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ route('product.profile',['name' => strtolower(str_replace(' ','-',$product->name)), 'id' => $product->id]) }}">
                                    <img src="/photo/product/{{ $product->image }}" alt="product" width="280" height="315">
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
                                    <a href="javascript:void(0)" class="btn-product-icon add-to-cart" data-id="{{ $product->id }}" style="min-width: initial;"><i class="d-icon-bag"></i></a>
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
            @endif
        </div>
    </div>
</main>
<!-- End Main -->
@endsection
