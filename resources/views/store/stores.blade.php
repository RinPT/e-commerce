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
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li class="delimiter">/</li>
                <li>Stores</li>
            </ul>
        </div>
        <div class="page-content mb-10 pb-10">
            <div class="container">
                <div class="form-wrapper mt-5 mb-2">
                    <form action="{{ route('stores.search') }}" method="get" class="input-wrapper-inline" style="max-width: 100%;">
                        <input type="text" class="form-control" name="store" id="store" placeholder="Search store..." required="">
                        <button class="btn btn-dark pl-5 pr-5 pb-0 pt-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="row cols-lg-3 cols-sm-2 cols-1 mt-4">
                    @foreach($stores as $store)
                    <div class="store-wrapper">
                        <div class="store">
                            <div class="store-header">
                                <figure class="store-banner">
                                    <img src="/images/vendor/store/5.jpg" alt="Vendor" width="447" height="291" style="background-color: #8d9eaa;" />
                                </figure>
                            </div>
                            <div class="store-content text-left">
                                <h2 class="store-title mb-1">
                                    <a href="{{ route('store.products',['name' => 'store','id' => $store->id]) }}">{{ $store->name }}</a>
                                </h2>
                                <div class="store-phone text-left">
                                    <a href="{{ route('category.product.index',['name' => $store->category->name]) }}" style="text-decoration: underline;">
                                        <i class="fa fa-project-diagram"></i>{{ $store->category->name }} Category
                                    </a>
                                </div>
                                <p>
                                    {{ $store->address }}
                                </p>
                                <p class="text-uppercase">{{ $store->city }}/{{ $store->country }}</p>
                                @if(!empty($store->phone))
                                    <div class="store-phone text-left">
                                        <i class="fa fa-phone"></i>{{ $store->phone }}
                                    </div>
                                @endif
                            </div>
                            <div class="store-footer">
                                <figure class="seller-avatar">
                                    <img src="/photo/store/{{ $store->logo }}" alt="Vendor avatar" width="64" height="64" />
                                </figure>
                                <a href="{{ route('store.products',['name' => 'store','id' => $store->id]) }}" class="btn btn-dark btn-link btn-underline">Visit Store<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
