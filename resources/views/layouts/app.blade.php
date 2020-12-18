<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('nprogress.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('nprogress.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <div class="left-menu logo">
                <router-link class="navbar-brand" to="/">
                    <h1>{{ config('app.name', 'Laravel') }}</h1>
                </router-link>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="pe-7s-menu"></span>
            </button>

            <div class="collapse navbar-collapse right-menu" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('Login')</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('Register')</a>
                    </li>
                    @endif
                    @else
                    <p class="nav-item" style="line-height:52px">+998-99-999-99-99</p>
                    <form class="form-inline my-2 my-lg-0 search">
                        <span class="icon pe-7s-search"></span>
                        <input type="text" placeholder="Search" aria-label="Search">
                    </form>
                    @if (auth()->user()->name == 'Oybek') <li class="nav-item new-product-link"><router-link to="/add-product" exact><span class="pe-7s-plus"></span> Add a New Product</router-link></li> @endif
                    <li class="nav-item">
                        <button class="c-btn" id="cart-open-btn">
                            <span class="cart-badge">0</span>
                            <span class="pe-7s-cart"></span>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="c-btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="pe-7s-user"></span><span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                @lang('Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
