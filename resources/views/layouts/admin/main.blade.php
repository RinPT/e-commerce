<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>{{ $site_title }} - Admin</title>
        <link rel="icon" type="image/png" href="/photo/favicon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/admin/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/admin/vendor/animate/animate.compat.css">

		<link rel="stylesheet" href="/admin/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="/admin/vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="/admin/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="/admin/vendor/morris/morris.css" />

		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/admin/css/theme.css" />

        <!-- Specific Page Vendor CSS -->
        @yield('styles')


		<!--(remove-empty-lines-end)-->

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/admin/css/custom.css">

		<!-- Head Libs -->
		<script src="/admin/vendor/modernizr/modernizr.js"></script>
		<script src="/admin/master/style-switcher/style.switcher.localstorage.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="{{ route('admin.home') }}" class="logo">
						<img src="/photo/{{ $site_logo }}" width="150" alt="{{ $site_title }}" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
                                @if($logged_author_type == "author")
                                    @if(!empty($logged_author->photo))
                                        <img src="{{ asset('photo/author/'.$logged_author->photo) }}" class="rounded-circle" data-lock-picture="{{ asset('photo/author/'.$logged_author->photo) }}" />
                                    @else
                                        <img src="{{ asset('photo/author/default.png') }}" class="rounded-circle" data-lock-picture="{{ asset('photo/author/default.png') }}" />
                                    @endif
                                @else
                                    @if(!empty($logged_author->logo))
                                        <img src="{{ asset('photo/store/'.$logged_author->logo) }}" class="rounded-circle" data-lock-picture="{{ asset('photo/store/'.$logged_author->logo) }}" />
                                    @else
                                        <img src="{{ asset('photo/author/default.png') }}" class="rounded-circle" data-lock-picture="{{ asset('photo/author/default.png') }}" />
                                    @endif
                                @endif
							</figure>
							<div class="profile-info">
								<span class="name">
                                    @if($logged_author_type == "author")
                                        {{ $logged_author->name." ".$logged_author->surname }}
                                    @else
                                        {{ $logged_author->name."(".$logged_author->username.")" }}
                                    @endif
                                </span>
								<span class="role text-capitalize">{{ $logged_author_gtype }}</span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
                                    @if($logged_author_type == "author")
                                        <a role="menuitem" tabindex="-1" href="{{ route('admin.author.edit',$logged_author->id) }}"><i class="bx bx-user-circle"></i> My Profile</a>
									@elseif($logged_author_type == "store")
                                        <a role="menuitem" tabindex="-1" href="{{ route('admin.store.edit',$logged_author->id) }}"><i class="bx bx-user-circle"></i> My Profile</a>
                                    @else
                                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user-circle"></i> My Profile</a>
                                    @endif
                                </li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('admin.logout') }}"><i class="bx bx-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">

				                <ul class="nav nav-main">
                                    @if(in_array(1,$logged_author->perms))
									<li>
										<a class="nav-link" href="{{ route('admin.home') }}">
											<i class="bx bx-home-alt" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
                                    @endif
                                    @if(in_array(1,$logged_author->perms))
									<li>
										<a class="nav-link" href="{{ route('admin.general-setting.edit') }}">
											<i class='bx bxs-cog'></i>
											<span>General Settings</span>
										</a>
									</li>
                                    @endif
                                    @if(in_array(2,$logged_author->perms))
                                    <li class="nav-parent @if(str_contains(url()->current(),'currency'))) nav-expanded @endif">
										<a class="nav-link" href="#">
											<i class='fas fa-dollar-sign'></i>
											<span>Currencies</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.currency') }}">
												   All Currencies
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.currency.create') }}">
													Add New Currency
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(3,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-backpack'></i>
											<span>Orders</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.orders') }}">
													Approved Orders
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.order.show_pending') }}">
													Pending Orders
												</a>
											</li>
                                            <li>
												<a class="nav-link" href="{{ route('admin.order.show_canceled') }}">
													Cancelled Orders
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.order.cancel_request') }}">
													Cancel Order Requests
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(4,$logged_author->perms))
									<li class="nav-parent @if(str_contains(url()->current(),'categor'))) nav-expanded @endif">
										<a class="nav-link" href="#">
											<i class='bx bxs-category-alt'></i>
											<span>Categories</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.categories') }}">
													All Categories
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.category.create') }}">
													Add New Category
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(5,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bx-grid-alt'></i>
											<span>Products</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.products') }}">
													All Products
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.product.create') }}">
													Add New Product
												</a>
											</li>

											<li>
												<a class="nav-link" href="{{ route('admin.coupons.create') }}">
													Add New Coupon
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.coupons') }}">
													Coupons
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(6,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-discount' ></i>
											<span>Discount Management</span>
										</a>
										<ul class="nav nav-children">
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Store Discount
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a href="{{ route('store.discount') }}">
				                                            View Discounts
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('store.discount.create') }}">
				                                            Create Discount
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
                                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Product Discount
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a href="{{ route('product.discount') }}">
				                                            View Discounts
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('product.discount.create') }}">
				                                            Create Discount
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
                                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Category Discount
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a href="{{ route('category.discount') }}">
				                                            View Discounts
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('category.discount.create') }}">
				                                            Create Discount
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                        </ul>
									</li>
                                    @endif
                                    @if(in_array(7,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-truck'></i>
											<span>Cargo</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.cargo') }}">
													All Countries
												</a>
											</li>

											<li>
												<a class="nav-link" href="{{ route('admin.cargo.create') }}">
													Add New Country
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(8,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bx-expand-alt' ></i>
											<span>Advertisements</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{route('admin.advertisement.index')}}">
													Advertisements
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{route('admin.advertisement.create')}}">
													Add a new advertisement
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(9,$logged_author->perms))
									<li class="nav-parent @if(str_contains(url()->current(),'perm') || str_contains(url()->current(),'group')) nav-expanded @endif">
										<a class="nav-link" href="#">
											<i class='bx bxs-key'></i>
											<span>Permission Management</span>
										</a>
										<ul class="nav nav-children">
                                            <!--
											<li>
												<a class="nav-link" href="{{ route('admin.perm.create') }}">
													Add New Permission
												</a>
											</li>
											-->
											<li>
												<a class="nav-link" href="{{ route('admin.group.create') }}">
													Add New Group
												</a>
											</li>
                                                <!--
											<li>
												<a class="nav-link" href="{{ route('admin.perms.index') }}">
													Permissions
												</a>
											</li>-->
											<li>
												<a class="nav-link" href="{{ route('admin.groups.index') }}">
													Groups
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(9,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bx-user-circle' ></i>
											<span>Author Management</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{route('admin.author.create')}}">
													Add New Author
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.authors') }}">
													Authors
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(10,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-user-circle'></i>
											<span>Store Management @if($store_requests_count) <span class="badge badge-warning">{{ $store_requests_count }}</span>@endif</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{route('admin.store.create')}}">
													Add New Store
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{route('admin.stores')}}">
													Stores
												</a>
											</li>

											<li>
												<a class="nav-link" href="{{route('admin.store.requests')}}">
													Store Application Requests @if($store_requests_count) <span class="badge badge-warning">{{ $store_requests_count }}</span>@endif
												</a>

											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(11,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-user' ></i>
											<span>User Management</span>
										</a>
										<ul class="nav nav-children">
                                            <li>
												<a class="nav-link" href="{{route('admin.user.index')}}">
													All Users
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{route('admin.user.create')}}">
													Add New User
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if(in_array(12,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bx-support'></i>
											<span>Ticket Management</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('admin.ticket.department.create') }}">
													Ticket Department Management
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.view_author_tickets')}}">
													Author's Tickets
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.view_store_tickets')}}">
													Store's Tickets
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('admin.view_user_tickets')}}">
													User's Tickets
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if (in_array(18, $logged_author->perms))
                                    <li class="nav-parent">
										<a class="nav-link" href="#">
											<i class="fas fa-image"></i>
											<span>Slider Management</span>
										</a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="{{ route('slider') }}">
                                                    Edit Slider
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="{{ route('slider.create') }}">
                                                    Create Slider
                                                </a>
                                            </li>
                                        </ul>
									</li>
                                    @endif
                                    @if(in_array(17,$logged_author->perms))
									<li>
										<a class="nav-link" href="{{ route('store.home') }}">
											<i class="bx bx-home-alt" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
                                    @endif
                                    @if(in_array(17,$logged_author->perms))
									<li>
										<a class="nav-link" href="{{ route('store.tickets') }}">
											<i class='bx bx-support'></i>
											<span>Tickets</span>
										</a>
									</li>
                                    @endif
                                    @if (in_array(15, $logged_author->perms))
                                    <li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bx-grid-alt'></i>
											<span>Products</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('store.product') }}">
													All Products
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('store.product.create') }}">
													Add New Product
												</a>
											</li>
										</ul>
									</li>
                                    @endif
                                    @if (in_array(15, $logged_author->perms))
                                    <li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-discount' ></i>
											<span>Discount</span>
										</a>
										<ul class="nav nav-children">
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Store Discount
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a href="{{ route('store.discount') }}">
				                                            View Discounts
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('store.discount.create') }}">
				                                            Create Discount
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
                                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Product Discount
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a href="{{ route('store.product.discount') }}">
				                                            View Discounts
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('store.product.discount.create') }}">
				                                            Create Discount
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                        </ul>
									</li>
                                    @endif
                                    @if(in_array(16,$logged_author->perms))
									<li class="nav-parent">
										<a class="nav-link" href="#">
											<i class='bx bxs-backpack'></i>
											<span>Orders</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a class="nav-link" href="{{ route('store.orders') }}">
													Approved Orders
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('store.orders.show_pending') }}">
													Pending Orders
												</a>
											</li>
                                            <li>
												<a class="nav-link" href="{{ route('store.orders.show_canceled') }}">
													Cancelled Orders
												</a>
											</li>
											<li>
												<a class="nav-link" href="{{ route('store.orders.show_cancel_request') }}">
													Cancel Order Requests
												</a>
											</li>
										</ul>
									</li>
                                    @endif
								</ul>
				            </nav>
				        </div>

				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>


				    </div>

				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
                        @yield('breadcrumb')
					</header>

					<!-- start: page -->
                    @yield('content')
					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="/admin/vendor/jquery/jquery.js"></script>
		<script src="/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/admin/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="/admin/vendor/popper/umd/popper.min.js"></script>
		<script src="/admin/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/admin/vendor/common/common.js"></script>
		<script src="/admin/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/admin/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="/admin/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="/admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="/admin/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		<script src="/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
		<script src="/admin/vendor/flot/jquery.flot.js"></script>
		<script src="/admin/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
		<script src="/admin/vendor/flot/jquery.flot.pie.js"></script>
		<script src="/admin/vendor/flot/jquery.flot.categories.js"></script>
		<script src="/admin/vendor/flot/jquery.flot.resize.js"></script>
		<script src="/admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="/admin/vendor/raphael/raphael.js"></script>
		<script src="/admin/vendor/morris/morris.js"></script>
		<script src="/admin/vendor/gauge/gauge.js"></script>
		<script src="/admin/vendor/snap.svg/snap.svg.js"></script>
		<script src="/admin/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="/admin/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="/admin/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="/admin/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="/admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

        <!-- Specific Page Vendor -->
        @yield('scripts')


		<!--(remove-empty-lines-end)-->

		<!-- Theme Base, Components and Settings -->
		<script src="/admin/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="/admin/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/admin/js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-42715764-8', 'auto');
		  ga('send', 'pageview');
		</script>
		<!-- Examples -->
		<script src="/admin/js/examples/examples.dashboard.js"></script>

        @yield('end-scripts')
	</body>
</html>
