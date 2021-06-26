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

    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Poppins:400,500,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
        let currency = {
            prefix: "{{$cookie_currency->prefix}}",
            suffix: "{{$cookie_currency->suffix}}",
        }
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
    <style>
        .cart-prod-added.show,.wishlist-added.show {
            left: -400px;
        }
        .fs-11 {
            font-size: 11px !important;
        }
        .fs-12 {
            font-size: 12px !important;
        }
    </style>
    @yield('custom-css')
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
                                <li><a href="?currency={{ $currency->id }}">{{ $currency->code }}</a></li>
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
                        <form action="{{ route('logout') }}" method="POST" class="nav-link ml-1" >
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
                        <form action="{{ route('search') }}" class="input-wrapper" method="get">
                            <input type="text" class="form-control" name="q" autocomplete="off" placeholder="Search a product..." value="{{ request()->get('q') }}" required />
                            <button class="btn btn-search" type="submit"><i class="d-icon-search"></i></button>
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
                                    <a href="{{ route('account') }}">Billings</a>
                                </li>
                                <li>
                                    <a href="{{ route('account') }}">Order History</a>
                                </li>
                                <li>
                                    <a href="{{ route('wishlist') }}">Wishlist</a>
                                </li>
                                <li>
                                    <a href="{{ route('ticket.create') }}">Create a Ticket</a>
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
    <div class="minipopup-area" style="left: initial;right: 0;">
        <div class="minipopup-box cart-prod-added">
            <p class="minipopup-title">Successfully Added</p>
            <div class="action-group d-flex">
                <a href="{{ route('cart') }}" class="btn btn-sm btn-outline btn-primary btn-rounded">View Cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-sm btn-primary btn-rounded">Check Out</a>
            </div>
        </div>
    </div>
    <div class="minipopup-area" style="left: initial;right: 0">
        <div class="minipopup-box wishlist-added">
            <p class="minipopup-title">Successfully added to wishlist</p>
            <div class="action-group text-center">
                <a href="{{ route('wishlist') }}" class="btn btn-sm btn-primary btn-rounded">View Wishlist</a>
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
        <form action="{{ route('search') }}" class="input-wrapper" method="get">
            <input type="text" class="form-control" name="q" autocomplete="off" placeholder="Search a product..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End Search Form -->
        <ul class="mobile-menu mmenu-anim">
            @foreach($header_items as $item)
            <li>
                <a href="{{ route('category.product.index',['name' => strtolower($item->name)]) }}">{{ $item->name }}</a>
                <ul>
                    @foreach($item['children'] as $child)
                    <li>
                        <a href="#">
                            {{ $child->name }}
                        </a>
                        <ul>
                            @foreach($child['children'] as $child2)
                            <li>
                                <a href="{{ route('category.product.index',['name' => strtolower($child2->name)]) }}">{{ $child2->name }}</a>
                                <ul>
                                    @foreach($child2['children'] as $child3)
                                    <li>
                                        <a href="{{ route('category.product.index',['name' => strtolower($child3->name)]) }}">{{ $child3->name }}</a>
                                        <ul>
                                            @foreach($child3['children'] as $child4)
                                            <li>
                                                <a href="{{ route('category.product.index',['name' => strtolower($child4->name)]) }}">{{ $child4->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
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
<script>
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
<!-- Main JS File -->
<script src="/js/user/main.min.js"></script>

@yield('javaScript')
</body>
</html>
