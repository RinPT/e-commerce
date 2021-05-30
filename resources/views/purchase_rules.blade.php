@extends('layouts.app')

@section('stylesheet')
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="/css/user/style.min.css">

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <div class="page-header pl-4 pr-4" style="background-image: url(/images/page-header/about-us.jpg)">
            <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Purchase Rules</h1>
            <p class="page-desc text-white mb-0 mt-3">All of the rights and rules at the bottom are valid for each user</p>
        </div>
        <div class="container mb-5 mt-5">
            {!! $purchase !!}
        </div>
    </main>
@endsection
