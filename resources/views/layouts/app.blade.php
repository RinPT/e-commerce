<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>Riode - Ultimate eCommerce</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="/images/icons/favicon.png">

	<script>
		WebFontConfig = {
			google: { families: [ 'Poppins:400,500,600,700' ] }
		};
		( function ( d ) {
			var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
			wf.src = 'js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore( wf, s );
		} )( document );

	</script>

	<link rel="stylesheet" type="text/css" href="/vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.min.css">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/photoswipe/default-skin/default-skin.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="css/demo1.min.css">
	<link rel="stylesheet" type="text/css" href="/css/user/style.min.css">

</head>

<body>
	<div class="page-wrapper">
		<header class="header header-border">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Riode store message or remove it!</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown">
                            <a href="#currency">USD</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">USD</a></li>
                                <li><a href="#EUR">EUR</a></li>
                            </ul>
                        </div>
                        <!-- End DropDown Menu -->
                        <div class="dropdown ml-5">
                            <a href="#language">ENG</a>
                            <ul class="dropdown-box">
                                <li>
                                    <a href="#USD">ENG</a>
                                </li>
                                <li>
                                    <a href="#EUR">FRH</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End DropDown Menu -->
                        <span class="divider"></span>
                        <a href="contact-us.html" class="contact d-lg-show"><i class="fas fa-map-marker-alt"></i>Contact</a>
                        <a href="#" class="help d-lg-show"><i class="far fa-question-circle"></i> Need Help</a>

                        @guest
                            <a href="{{ route('login') }}"><i class="fas fa-user mr-1"></i>Log in</a>
                            <span class="delimiter mr-0">/</span>
                            <a class="ml-1" href="{{ route('register') }}">Register</a>
                        @endguest

                        @auth
                            <a href="{{ route('account') }}"><i class="fas fa-user mr-1"></i>{{ auth()->user()->username }}</a>
                            <span class="delimiter mr-0">/</span>
                            <form action="{{ route('logout') }}" method="POST" class="nav-link ml-1 mb-1" >
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
                        <a href="demo1.html" class="logo">
                            <img src="images/logo.png" alt="logo" width="153" height="44" />
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
                        <a href="tel:#" class="icon-box icon-box-side">
                            <div class="icon-box-icon mr-0 mr-lg-2">
                                <i class="d-icon-phone"></i>
                            </div>
                            <div class="icon-box-content d-lg-show">
                                <h4 class="icon-box-title">Call Us Now:</h4>
                                <p>0(800) 123-456</p>
                            </div>
                        </a>
                        <span class="divider"></span>
                        <a href="wishlist.html" class="wishlist">
                            <i class="d-icon-heart"></i>
                        </a>
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                            <a href="#" class="cart-toggle label-block link">
                                <div class="cart-label d-lg-show">
                                    <span class="cart-name">Shopping Cart:</span>
                                    <span class="cart-price">$0.00</span>
                                </div>
                                <i class="d-icon-bag"><span class="cart-count">2</span></i>
                            </a>
                            <div class="cart-overlay"></div>
                            <!-- End Cart Toggle -->
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <h4 class="cart-title">Shopping Cart</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                            class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="images/cart/product-1.jpg" alt="product" width="80"
                                                    height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Riode White Trends</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$21.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End of Cart Product -->
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="images/cart/product-2.jpg" alt="product" width="80"
                                                    height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Dark Blue Women’s
                                                Leomora Hat</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$118.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$139.00</span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="cart.html" class="btn btn-dark btn-link">View Cart</a>
                                    <a href="checkout.html" class="btn btn-dark"><span>Go To Checkout</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom d-lg-show">
                <div class="container">
                    <div class="header-left">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="shop.html">Categories</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Variations 1</h4>
                                                <ul>
                                                    <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                                    <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
                                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter</a>
                                                    </li>
                                                    <li><a href="shop-navigation-filter.html">Navigation Filter<span
                                                                class="tip tip-hot">Hot</span></a></li>

                                                    <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                                                    <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Variations 2</h4>
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
                                            </div>
                                            <div
                                                class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner1 banner banner-fixed">
                                                <figure>
                                                    <img src="images/menu/banner-1.jpg" alt="Menu banner" width="221"
                                                        height="330" />
                                                </figure>
                                                <div class="banner-content y-50">
                                                    <h4 class="banner-subtitle font-weight-bold text-primary ls-m">Sale.
                                                    </h4>
                                                    <h3 class="banner-title font-weight-bold"><span
                                                            class="text-uppercase">Up to</span>70% Off</h3>
                                                    <a href="shop.html" class="btn btn-link btn-underline">shop now<i
                                                            class="d-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Megamenu -->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="product.html">Products</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Product Pages</h4>
                                                <ul>
                                                    <li><a href="product-simple.html">Simple Product</a></li>
                                                    <li><a href="product.html">Variable Product</a></li>
                                                    <li><a href="product-sale.html">Sale Product</a></li>
                                                    <li><a href="product-featured.html">Featured &amp; On Sale</a></li>

                                                    <li><a href="product-left-sidebar.html">With Left Sidebar</a></li>
                                                    <li><a href="product-right-sidebar.html">With Right Sidebar</a></li>
                                                    <li><a href="product-sticky-cart.html">Add Cart Sticky<span
                                                                class="tip tip-hot">Hot</span></a></li>
                                                    <li><a href="product-tabinside.html">Tab Inside</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Product Layouts</h4>
                                                <ul>
                                                    <li><a href="product-grid.html">Grid Images<span
                                                                class="tip tip-new">New</span></a></li>
                                                    <li><a href="product-masonry.html">Masonry</a></li>
                                                    <li><a href="product-gallery.html">Gallery Type</a></li>
                                                    <li><a href="product-full.html">Full Width Layout</a></li>
                                                    <li><a href="product-sticky.html">Sticky Info</a></li>
                                                    <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a>
                                                    </li>
                                                    <li><a href="product-horizontal.html">Horizontal Thumb</a></li>

                                                    <li><a href="#">Build Your Own</a></li>
                                                </ul>
                                            </div>
                                            <div
                                                class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner2 banner banner-fixed">
                                                <figure>
                                                    <img src="images/menu/banner-2.jpg" alt="Menu banner" width="221"
                                                        height="330" />
                                                </figure>
                                                <div class="banner-content x-50 text-center">
                                                    <h3 class="banner-title text-white text-uppercase">Sunglasses</h3>
                                                    <h4 class="banner-subtitle font-weight-bold text-white mb-0">$23.00
                                                        -
                                                        $120.00</h4>
                                                </div>
                                            </div>
                                            <!-- End MegaMenu -->
                                        </div>
                                    </div>
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
                                <li class="d-xl-show">
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
                                    <a href="about-us.html">About Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <a href="#"><i class="d-icon-card"></i>Special Offers</a>
                        <a href="https://d-themes.com/buynow/riodehtml" target="_blank" class="ml-6">Buy Riode!</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->

        @yield('content')

		<footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="demo1.html" class="logo-footer">
                                <img src="images/logo-footer.png" alt="logo-footer" width="154" height="43" />
                            </a>
                            <!-- End FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                    <h4 class="widget-title">Subscribe to our Newsletter</h4>
                                    <p>Get all the latest information, Sales and Offers.</p>
                                </div>
                                <form action="#" class="input-wrapper input-wrapper-inline">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email address here..." required />
                                    <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Newsletter -->
                        </div>
                    </div>
                </div>
                <!-- End FooterTop -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-info">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <label>Phone:</label>
                                        <a href="tel:#">Toll Free (123) 456-7890</a>
                                    </li>
                                    <li>
                                        <label>Email:</label>
                                        <a href="mailto:mail@riode.com">mail@riode.com</a>
                                    </li>
                                    <li>
                                        <label>Address:</label>
                                        <a href="#">123 Street Name, City, England</a>
                                    </li>
                                    <li>
                                        <label>WORKING DAYS / HOURS:</label>
                                    </li>
                                    <li>
                                        <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
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
                                        <a href="#">Returns</a>
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
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">Sign in</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">View Cart</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#">Track My Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
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
                            <img src="images/payment.png" alt="payment" width="159" height="29" />
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">Riode eCommerce &copy; 2021. All Rights Reserved</p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                        </div>
                    </div>
                </div>
                <!-- End FooterBottom -->
            </div>
        </footer>
		<!-- End Footer -->
	</div>
	<!-- Sticky Footer -->
	<div class="sticky-footer sticky-content fix-bottom">
        <a href="demo1.html" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
        </a>
        <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
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
				<li><a href="https://d-themes.com/buynow/riodehtml">Buy Riode!</a></li>
			</ul>
			<!-- End MobileMenu -->
		</div>
	</div>
	<!-- Plugins JS File -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
	<script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/vendor/sticky/sticky.min.js"></script>
	<script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="/vendor/photoswipe/photoswipe.min.js"></script>
	<script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/vendor/parallax/parallax.min.js"></script>


	<!-- Main JS File -->
	<script src="/js/user/main.min.js"></script>




</body>

</html>
