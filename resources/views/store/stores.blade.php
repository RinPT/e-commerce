@extends('layouts.app')

@section('stylesheet')
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="/css/user/style.min.css">
@endsection

@section('content')
    <main class="main">
        <div class="page-header"
             style="background-image: url('/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
            <h1 class="page-title">Stores</h1>
            <ul class="breadcrumb">
                <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                <li class="delimiter">/</li>
                <li>Stores</li>
            </ul>
        </div>
        <div class="page-content mb-10 pb-10">
            <div class="container">
                <div class="form-wrapper mt-5 mb-2">
                    <form action="#" class="input-wrapper-inline" style="max-width: 100%;">
                        <input type="email" class="form-control" name="vendor" id="vendor" placeholder="Search Vendors" required="">
                        <button class="btn btn-dark pl-5 pr-5 pb-0 pt-0" type="submit">Apply</button>
                    </form>
                </div>
                <div class="row cols-lg-3 cols-sm-2 cols-1 mt-4">
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/1.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #8d9eaa;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor1</a>
                                </h2>
                                <p class="text-left">
                                    <span class="street">Steven Street,</span><br>
                                    <span class="city">El Carjon,</span><br>
                                </p>
                                <div class="store-phone text-left">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/1.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/2.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #c2c3c3;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor2</a>
                                </h2>
                                <div class="ratings-container">
                                        <span class="ratings-full" title="Rated 4.65 out of 5">
                                            <span class="ratings" style="width:87%"></span>
                                        </span>
                                </div>
                                <p>
                                    <span class="state">London,</span>
                                    <span class="Country">United Kingdom (UK)</span>
                                </p>
                                <div class="store-phone">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/2.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/3.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #868d8d;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor3</a>
                                </h2>
                                <div class="ratings-container">
                                        <span class="ratings-full" title="Rated 4.65 out of 5">
                                            <span class="ratings" style="width:87%"></span>
                                        </span>
                                </div>
                                <p>
                                    <span class="state">Rio de Janeiro,</span>
                                    <span class="Country">Brazil</span>
                                </p>
                                <div class="store-phone">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/3.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/4.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #dac6ad;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor4</a>
                                </h2>
                                <div class="ratings-container">
                                        <span class="ratings-full" title="Rated 4.65 out of 5">
                                            <span class="ratings" style="width:87%"></span>
                                        </span>
                                </div>
                                <p>
                                    <span class="state">Ontario,</span>
                                    <span class="Country">Canada</span>
                                </p>
                                <div class="store-phone">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/4.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/5.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #4c3f3d;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor5</a>
                                </h2>
                                <div class="ratings-container">
                                        <span class="ratings-full" title="Rated 4.65 out of 5">
                                            <span class="ratings" style="width:87%"></span>
                                        </span>
                                </div>
                                <p>
                                    <span class="state">Canberra,</span>
                                    <span class="Country">Australia</span>
                                </p>
                                <div class="store-phone">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/5.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="images/vendor/store/6.jpg" alt="Vendor" width="447" height="291"
                                         style="background-color: #2d3c3b;" />
                                </figure>
                            </div>
                            <div class="store-content">
                                <h2 class="store-title">
                                    <a href="{{ route('store.products',['name' => 'store']) }}">Vendor6</a>
                                </h2>
                                <div class="ratings-container">
                                        <span class="ratings-full" title="Rated 4.65 out of 5">
                                            <span class="ratings" style="width:87%"></span>
                                        </span>
                                </div>
                                <p>
                                    <span class="state">Berlin,</span>
                                    <span class="Country">Germany</span>
                                </p>
                                <div class="store-phone">
                                    <i class="fa fa-phone"></i>123456789
                                </div>
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="images/vendor/avatar/6.jpg" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store']) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
