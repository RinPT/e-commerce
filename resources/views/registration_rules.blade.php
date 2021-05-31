@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header pl-4 pr-4" style="background-image: url(/images/page-header/about-us.jpg)">
            <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Registration Rules</h1>
            <p class="page-desc text-white mb-0 mt-3">All of the rights and rules at the bottom are valid for each user</p>
        </div>
        <div class="container mb-5 mt-5">
            {!! $registration !!}
        </div>
    </main>
@endsection
