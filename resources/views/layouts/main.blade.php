<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">

       <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <title>E-Commerce</title>
   </head>

   <body class="bg-gray-400">
      <nav class="p-6 bg-white flex justify-between mb-6">
         <ul class="flex items-center">
            <li>
               <a href="{{ route('home')}}" class="p-3"> Home </a>
            </li>

            <li>
               <a href="#" class="p-3"> Products </a>
            </li>

         </ul>

         <ul class="flex items-center">
            @auth
               <li>
                  <a href="{{route('user.profile',auth()->user())}}" class="p-3"> {{ auth()-> user() -> username }} </a>
               </li>
               <li>
                  <form action="{{ route('logout')}}" method="post" class="p-3 inline">
                     @csrf
                        <button type="submit" > Logout </button>

                  </form>

               </li>
            @endauth

            @guest
               <li>
                  <a href="{{ route('login')}}" class="p-3"> Login </a>
               </li>
               <li>
                  <a href="{{ route('register')}}" class="p-3"> Register </a>
               </li>
            @endguest
         </ul>

      </nav>
      @yield('content')
   </body>
</html>
