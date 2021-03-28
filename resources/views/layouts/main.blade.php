<!DOCTYPE html>

<html>
   <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>E-Commerce</title>
   </head>

   <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex align-items-center shadow p-3 mb-2 bg-white rounded">
            <a class="navbar-brand" href="#">Our Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between mt-1" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home')}}" class="nav-link"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products') }}" class="nav-link"> Products </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                       <li class="nav-item">
                          <a href="{{route('user.profile',auth()->user())}}" class="nav-link"> {{ auth()->user()->username }} </a>
                       </li>
                       <li class="nav-item">
                          <form action="{{ route('logout')}}" method="post" class="nav-link">
                             @csrf
                                <button type="submit" > Logout </button>

                          </form>

                       </li>
                    @endauth

                    @guest
                       <li class="nav-item">
                          <a href="{{ route('login')}}" class="nav-link"> Login </a>
                       </li>
                       <li class="nav-item">
                          <a href="{{ route('register')}}" class="nav-link"> Register </a>
                       </li>

                    @endguest
                 </ul>
            </div>
        </nav>
        @yield('content')
   </body>
</html>
