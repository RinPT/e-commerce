<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $site_title }}</title>

    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="description" content="{{ $meta_description }}">
    <meta name="author" content="HSBCS">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/photo/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:400,500,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    @yield('bootstrap')
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->

    <link rel="stylesheet" type="text/css" href="/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.min.css">

    <!-- Plugins CSS File -->
    @yield('plugin-styles')

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="/css/user/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="/css/user/style.min.css">

</head>

<body>
<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">Welcome, do you want to become a seller? <a class="text-primary" href="{{ route('application.form') }}">Click here</a></p>
                </div>
                <div class="header-right">
                    <!-- End DropDown Menu -->
                    <div class="dropdown">
                        <a href="#currency">{{ $cookie_currency->code }}</a>
                        <ul class="dropdown-box">
                            @foreach ($header_currencies as $currency)
                                @if($cookie_currency->code == $currency->code)
                                    @continue
                                @endif
                                <li><a href="@if(empty($QS))?currency=@else?{{ $QS }}&currency=@endif{{ $currency->id }}">{{ $currency->code }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End DropDown Menu -->
                    <span class="divider"></span>
                    @guest
                        <a href="{{ route('login') }}"><i class="fas fa-user mr-1"></i>Log in</a>
                        <span class="delimiter mr-0">/</span>
                        <a class="ml-1" href="{{ route('register') }}">Register</a>
                    @endguest

                    @auth
                        <a href="{{ route('account') }}"><i class="fas fa-user mr-1"></i>{{ auth()->user()->username }}</a>
                        <span class="delimiter mr-0">/</span>
                        <form action="{{ route('logout') }}" method="POST" class="nav-link mb-1" >
                            @csrf
                            <button style="font-size: 11px" type="submit" class="btn btn-link">Logout</button>
                        </form>
                @endauth
                <!-- End of Login -->

                </div>
            </div>
        </div>
        <!-- End HeaderTop -->
        <div class="header-middle sticky-header fix-top sticky-content">
            <div class="container">
                <div class="header-left">
                    <a href="#" class="mobile-menu-toggle">
                        <i class="d-icon-bars2"></i>
                    </a>
                    <a href="{{ route('home') }}" class="logo">
                        <img src="/photo/{{ $site_logo }}" alt="logo" />
                    </a>
                    <!-- End Logo -->

                    <div class="header-search hs-simple">
                        <form action="#" class="input-wrapper">
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                   placeholder="Search..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- End Header Search -->
                </div>
                <div class="header-right">
                    <a href="tel:{{ $site_tel }}" class="icon-box icon-box-side">
                        <div class="icon-box-icon mr-0 mr-lg-2">
                            <i class="d-icon-phone"></i>
                        </div>
                        <div class="icon-box-content d-lg-show">
                            <h4 class="icon-box-title">Call Center</h4>
                            <p>{{ $site_tel }}</p>
                        </div>
                    </a>
                    <span class="divider"></span>
                    <a href="{{ route('wishlist') }}" class="wishlist">
                        <i class="d-icon-heart" style="font-size: 3rem"></i>
                    </a>
                    <span class="divider"></span>
                    <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                        <a href="{{ route('cart') }}" class="label-block link">
                            <i class="d-icon-bag" style="font-size: 3rem"><span class="cart-count">{{ $cart_product_count }}</span></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .dropdown-content-sub {
                display: none;
            }
        </style>
        <div class="header-bottom d-lg-show">
            <div class="container">
                <div class="header-left">
                    <nav class="main-nav">
                        <ul class="menu">
                            @foreach($header_items as $item)
                                <li>
                                    <a href="{{ route('category.product.index',['name' => strtolower($item->name)]) }}">{{ $item->name }}</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    @foreach($item['children'] as $child)
                                                        <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                            <h4 class="menu-title">{{ $child->name }}</h4>
                                                            @foreach($child['children'] as $child2)
                                                                <ul>
                                                                    <li class="">
                                                                        <a href="{{ route('category.product.index',['name' => strtolower($child2->name)]) }}">{{ $child2->name }}</a>
                                                                        @if(count($child2['children']))<ul>@endif
                                                                            @foreach($child2['children'] as $child3)
                                                                                <li>
                                                                                    <a href="{{ route('category.product.index',['name' => strtolower($child3->name)]) }}">{{ $child3->name }}</a>
                                                                                    @if(count($child3['children']))<ul>@endif
                                                                                        @foreach($child3['children'] as $child4)
                                                                                            <li>
                                                                                                <a href="{{ route('category.product.index',['name' => strtolower($child4->name)]) }}">{{ $child4->name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                        @if(count($child3['children']))</ul>@endif
                                                                                </li>
                                                                            @endforeach
                                                                            @if(count($child2['children']))</ul>@endif
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="{{ route('stores.index') }}"><i class="d-icon-layer"></i>Available Stores <i class="d-icon-layer pl-2"></i></a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer-middle">
                <div class="row">
                    <div class="col-lg-3 col-md-6 " style="align-self: center;">
                        <a href="{{ route('home') }}" class="logo-footer">
                            <img src="/photo/logo-footer.png" alt="logo-footer" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget-info">
                            <h4 class="widget-title">Contact Info</h4>
                            <ul class="widget-body">
                                <li>
                                    <label>Phone:</label>
                                    <a href="tel:{{ $site_tel }}">{{ $site_tel }}</a>
                                </li>
                                <li>
                                    <label>Email:</label>
                                    <a href="mailto:{{ $site_email }}">{{ $site_email }}</a>
                                </li>
                                <li>
                                    <label>Address:</label>
                                    <a href="#">{{ $site_address }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget ml-lg-4">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="widget-body">
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Order History</a>
                                </li>
                                <li>
                                    <a href="#">Custom Service</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Condition</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget ml-lg-4">
                            <h4 class="widget-title">Quick Links</h4>
                            <ul class="widget-body">
                                <li>
                                    <a href="{{ route('register') }}">Sign in</a>
                                </li>
                                <li>
                                    <a href="{{ route('registration.index') }}">Registration Rules</a>
                                </li>
                                <li>
                                    <a href="{{ route('purchase.index') }}">Purchase Rules</a>
                                </li>
                                <li>
                                    <a href="{{ route('registration.index') }}">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6" style="display: none">
                        <div class="widget widget-instagram">
                            <h4 class="widget-title">Instagram</h4>
                            <figure class="widget-body row">
                                <div class="col-3">
                                    <img src="images/instagram/01.jpg" alt="instagram 1" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/02.jpg" alt="instagram 2" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/03.jpg" alt="instagram 3" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/04.jpg" alt="instagram 4" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/05.jpg" alt="instagram 5" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/06.jpg" alt="instagram 6" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/07.jpg" alt="instagram 7" width="64" height="64" />
                                </div>
                                <div class="col-3">
                                    <img src="images/instagram/08.jpg" alt="instagram 8" width="64" height="64" />
                                </div>
                            </figure>
                        </div>
                        <!-- End Instagram -->
                    </div>
                </div>
            </div>
            <!-- End FooterMiddle -->
            <div class="footer-bottom">
                <div class="footer-left">
                    <figure class="payment">
                        <img src="/images/payment.png" alt="payment" width="159" height="29" />
                    </figure>
                </div>
                <div class="footer-center">
                    <p class="copyright">{{$site_title}} &copy; 2021. All Rights Reserved</p>
                </div>
                <div class="footer-right">
                    <div class="social-links">
                        <a href="{{$site_facebook}}" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
                        <a href="{{$site_twitter}}" target="_blank" class="social-link social-twitter fab fa-twitter"></a>
                        <a href="{{$site_instagram}}" target="_blank" class="social-link social-linkedin fab fa-instagram"></a>
                    </div>
                </div>
            </div>
            <!-- End FooterBottom -->
        </div>
    </footer>
    <!-- End Footer -->
    <div class="minipopup-area" style="left: initial;right: 0">
        <div class="minipopup-box cart-prod-added" style="top: 0;left: -400px">
            <p class="minipopup-title">Successfully Added</p>
            <div class="action-group d-flex">
                <a href="{{ route('cart') }}" class="btn btn-sm btn-outline btn-primary btn-rounded">View Cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-sm btn-primary btn-rounded">Check Out</a>
            </div>
        </div>
    </div>
    <div class="minipopup-area" style="left: initial;right: 0">
        <div class="minipopup-box wishlist-added" style="top: 0;left: -400px">
            <p class="minipopup-title">Successfully added to wishlist</p>
            <div class="action-group text-center">
                <a href="{{ route('wishlist') }}" class="btn btn-sm btn-outline btn-primary btn-rounded">View Wishlist</a>
            </div>
        </div>
    </div>
</div>
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                   placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="#" class="active">Categories</a>
                <ul>
                    <li>
                        <a href="#">
                            Variations 1
                        </a>
                        <ul>
                            <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                            <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                            <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
                            <li><a href="shop-horizontal-filter.html">Horizontal Filter</a></li>
                            <li><a href="#">Navigation Filter<span class="tip tip-hot">Hot</span></a></li>

                            <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                            <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Variations 2
                        </a>
                        <ul>

                            <li><a href="shop-grid-3cols.html">3 Columns Mode<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                            <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                            <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                            <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                            <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                            <li><a href="shop-list.html">List Mode</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="product.html">Products</a>
                <ul>
                    <li>
                        <a href="#">Product Pages</a>
                        <ul>
                            <li><a href="product-simple.html">Simple Product</a></li>
                            <li><a href="product.html">Variable Product</a></li>
                            <li><a href="product-sale.html">Sale Product</a></li>
                            <li><a href="product-featured.html">Featured &amp; On Sale</a></li>

                            <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                            <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                            <li><a href="product-sticky-cart.html">Add Cart Sticky<span
                                        class="tip tip-hot">Hot</span></a></li>
                            <li><a href="product-tabinside.html">Tab Inside</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Product Layouts</a>
                        <ul>
                            <li><a href="product-grid.html">Grid Images<span class="tip tip-new">New</span></a></li>
                            <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a></li>
                            <li><a href="product-gallery.html">Gallery Type</a></li>
                            <li><a href="product-full.html">Full Width Layout</a></li>
                            <li><a href="product-sticky.html">Sticky Info</a></li>
                            <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a></li>
                            <li><a href="product-horizontal.html">Horizontal Thumb</a></li>
                            <li><a href="product-left-sidebar">Left Sidebar</a></li>
                            <li><a href="#">Build Your Own</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Pages</a>
                <ul>
                    <li><a href="about-us.html">About</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                    <li><a href="account.html">Login</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                    <li><a href="error-404.html">Error 404</a></li>
                    <li><a href="coming-soon.html">Coming Soon</a></li>
                </ul>
            </li>
            <li>
                <a href="blog-classic.html">Blog</a>
                <ul>
                    <li><a href="blog-classic.html">Classic</a></li>
                    <li><a href="blog-listing.html">Listing</a></li>
                    <li>
                        <a href="#">Grid</a>
                        <ul>
                            <li><a href="blog-grid-2col.html">Grid 2 columns</a></li>
                            <li><a href="blog-grid-3col.html">Grid 3 columns</a></li>
                            <li><a href="blog-grid-4col.html">Grid 4 columns</a></li>
                            <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Masonry</a>
                        <ul>
                            <li><a href="blog-masonry-2col.html">Masonry 2 columns</a></li>
                            <li><a href="blog-masonry-3col.html">Masonry 3 columns</a></li>
                            <li><a href="blog-masonry-4col.html">Masonry 4 columns</a></li>
                            <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Mask</a>
                        <ul>
                            <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                            <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="post-single.html">Single Post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Elements</a>
                <ul>
                    <li><a href="element-products.html">Products</a></li>
                    <li><a href="element-typography.html">Typography</a></li>
                    <li><a href="element-titles.html">Titles</a></li>
                    <li><a href="element-categories.html">Product Category</a></li>
                    <li><a href="element-buttons.html">Buttons</a></li>
                    <li><a href="element-accordions.html">Accordions</a></li>
                    <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                    <li><a href="element-tabs.html">Tabs</a></li>
                    <li><a href="element-testimonials.html">Testimonials</a></li>
                    <li><a href="element-blog-posts.html">Blog Posts</a></li>
                    <li><a href="element-instagrams.html">Instagrams</a></li>
                    <li><a href="element-cta.html">Call to Action</a></li>
                    <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                    <li><a href="element-icons.html">Icons</a></li>
                </ul>
            </li>
        </ul>
        <!-- End MobileMenu -->
    </div>
</div>

<!-- Plugins JS File -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/parallax/parallax.min.js"></script>
<script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
@yield('plugin-scripts')
<!-- Main JS File -->
<script src="/js/user/main.min.js"></script>

@yield('javaScript')
</body>

</html>
