<!DOCTYPE html>

<html>
   <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>E-Commerce</title>
   </head>

   <body class="bg-gray-400">
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex align-items-center">
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
                        <a href="#" class="nav-link"> Products </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                       <li class="nav-item">
                          <a href="{{route('user.profile',auth()->user())}}" class="nav-link"> {{ auth()-> user() -> username }} </a>
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
