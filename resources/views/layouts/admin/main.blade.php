<!doctype html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/admin/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/animate/animate.compat.css">

    <link rel="stylesheet" href="/admin/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="/admin/vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="/admin/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />

    <!-- Specific Page Vendor CSS -->
    @yield('styles')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/admin/css/theme.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/admin/css/custom.css">

    <!-- Head Libs -->
    <script src="/admin/vendor/modernizr/modernizr.js"></script>
</head>
<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="../3.1.0" class="logo">
                    <img src="/admin/img/logo.png" width="75" height="35" alt="Porto Admin" />
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
                            <img src="/admin/img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="/admin/img/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name">Berk ÇETİN</span>
                            <span class="role">Administrator</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user-circle"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="bx bx-power-off"></i> Logout</a>
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
                                <li>
                                    <a class="nav-link" href="{{route('admin.home')}}">
                                        <i class="bx bx-home-alt" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-cog'></i>
                                        <span>Settings</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                               General Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                E-mail Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                SEO Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Currencies
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-backpack'></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                All Orders
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Pending Orders
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Send Orders
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Cancel Order Requests
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-category-alt'></i>
                                        <span>Categories</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                Add New Category
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                All Categories
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bx-grid-alt'></i>
                                        <span>Products</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                Add New Product
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                All Products
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Add New Coupone
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Coupones
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Comments
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Complains
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-discount' ></i>
                                        <span>Discount Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                Store's Discounts
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Category's Discounts
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Product's Discounts
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-truck'></i>
                                        <span>Cargo</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                Countries
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bx-expand-alt' ></i>
                                        <span>Advertisements</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('add.user_group_display')}}">
                                                Add a New Advertisement
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{route('add.user_group_display')}}">
                                                Category Advertisemets
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent @if(str_contains(url()->current(),'perm') || str_contains(url()->current(),'group')) nav-expanded @endif">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-key'></i>
                                        <span>Permission Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{ route('admin.perm.create') }}">
                                                Add New Permission
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('admin.group.create') }}">
                                                Add New Group
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('admin.perms.index') }}">
                                                Permissions
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('admin.groups.index') }}">
                                                Groups
                                            </a>
                                        </li>
                                    </ul>
                                </li>
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
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-user-circle'></i>
                                        <span>Store Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('add.user_group_display')}}">
                                                Add New Store
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Stores
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-user' ></i>
                                        <span>User Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('add.user_group_display')}}">
                                                Add New User
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Users
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bx-support'></i>
                                        <span>Ticket Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{ route('admin.view_create_new_ticket')}}">
                                                Create New Ticket
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Add New Ticket Department
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
                                            <a class="nav-link" href="{{ route('admin.view_store_tickets')}}">
                                                User's Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Open Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Answered Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Closed Tickets
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent ">
                                    <a class="nav-link" href="#">
                                        <i class='bx bx-money'></i>
                                        <span>Payment Management</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="add.config_display">
                                                Add New Payment Gateway
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Payment Gateways
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Add Bank Account
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">
                                                Bank Accounts
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class='bx bxs-book'></i>
                                        <span>Log Records</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="">
                                                Activity Logs
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="">
                                                Ticket Logs
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <div class="right-wrapper text-right">
                        <ol class="breadcrumbs mr-3">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </header>
                @yield('content')
            </section>
        </div>
    </section>

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

    <!-- Vendor -->
    <script src="/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="/admin/vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="/admin/vendor/popper/umd/popper.min.js"></script>
    <script src="/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/admin/vendor/common/common.js"></script>
    <script src="/admin/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="/admin/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    @yield('scripts')

    <!-- Theme Base, Components and Settings -->
    <script src="/admin/js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="/admin/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="/admin/js/theme.init.js"></script>

    @yield('end-scripts')
</body>
</html>
