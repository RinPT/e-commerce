
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>{{ $site_title }} - Login</title>
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

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/admin/css/theme.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/admin/css/custom.css">

    <!-- Head Libs -->
    <script src="/admin/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a class="logo float-left">
            <img src="/photo/{{ $site_logo }}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> Sign In</h2>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Success</strong> {{ Session::get('success') }}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Error!</strong> {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('admin.login.post') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email or Username</label>
                        <div class="input-group">
                            <input name="username" type="text" class="form-control form-control-lg" required/>
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="bx bx-user text-4"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Password</label>
                            <a href="{{ route('admin.pwreset') }}" class="float-right">Lost Password?</a>
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control form-control-lg" required/>
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="bx bx-lock text-4"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="RememberMe" name="rememberme" type="checkbox"/>
                                <label for="RememberMe">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">{{ $site_title }} © 2021. All Rights Reserved</p>
    </div>
</section>
<!-- end: page -->

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

<!-- Theme Base, Components and Settings -->
<script src="/admin/js/theme.js"></script>

<!-- Theme Custom -->
<script src="/admin/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/admin/js/theme.init.js"></script>
</body>
</html>
