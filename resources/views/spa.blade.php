<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Vue SPA Demo</title>
</head>
<body>



{{--    <!-- Right Side Of Navbar -->--}}
{{--    <ul class="navbar-nav ml-auto">--}}
{{--        <!-- Authentication Links -->--}}
        @guest
          <li class="nav-item">--}}
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
          </li>--}}
          @endguest

  {{ auth()->user() }}

123
{{--            @if (Route::has('register'))--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        @else--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endguest--}}
{{--    </ul>--}}



<div id="app">
    <app></app>
</div>


<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

