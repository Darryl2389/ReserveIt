<!doctype html>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reserve It</title
    <link rel="icon" type="image/png" href="{{ asset('storage/images/Logo-Mini.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Autocomplete -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
</head>
<body>
    <div id="app">
      @if(\Route::current()->getName() == 'welcome')
      <nav class="navbar navbar-expand-md">
    @else
    <nav class="navbar navbar-expand-md bg-dark">
    @endif
            <div class="container">
                <a class="navbar-brand text-primary" href="{{ url('/') }}">
                  <row>
                    <img src="{{ asset('storage/images/Logo-Header.png') }}" alt="..." class="img-thumbnail" style="background-color:transparent; border-color:transparent;" >
                </row>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('admin.reservations.index') }}"</a>
                                    Reservations
                                  </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
  <footer class="p-3 mb-2 bg-dark text-white" id="myFooter">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <img src="{{ asset('storage/images/Logo-Header.png') }}" alt="..." class="img-thumbnail" style="background-color:transparent; border-color:transparent;" >
      </div>
      <div class="col-sm-2" style="padding-right:20px; border-left: 1px solid #ccc; height: 75px;">
        <h3>Get Started</h3>
        <p>Home</p>
        <p>Sign Up</p>
        <p>Downloads</p>
      </div>
      <div class="col-sm-2" style="padding-right:20px; border-left: 1px solid #ccc; height: 75px;">
        <h3>About Us</h3>
        <p>Contact Us</p>
        <p>Reviews</p>
      </div>
      <div class="col-sm-2" style="padding-right:20px; border-left: 1px solid #ccc; height: 75px;">
        <h3>Support</h3>
        <p>FAQ</p>
        <p>Cookie Information</p>
        <p>Help Desk</p>
      </div>
      <div class="col-sm-3" style="padding-right:20px; border-left: 1px solid #ccc; height: 75px;">
        <a href="#" class="fa fa-facebook" style="font-size: 30px; margin-left: 20px; margin-right: 15px; color: white;"></a>
        <a href="#" class="fa fa-twitter" style="font-size: 30px; margin-right: 15px; color: white;"></a>
        <a href="#" class="fa fa-instagram" style="font-size: 30px; margin-right: 15px; color: white;"></a>
      </div>
    </div>
  </div>
</footer>
    </div>
</body>
</html>
