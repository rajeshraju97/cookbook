<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cookbook')</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <script src="{{asset('js/main.js')}}"></script>
</head>

<body>

    <nav class="uk-navbar-container uk-letter-spacing-small">
        <div class="uk-container">
            <div class="uk-position-z-index" data-uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="{{url('/')}}">Cookbook</a>
                    <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
                        <li class="{{ request()->is('/') ? 'uk-active' : '' }}"><a href="{{url('/')}}">Home</a></li>

                        <li class="{{ request()->is('recipe') ? 'uk-active' : '' }}"><a
                                href="{{route('recipe')}}">Receipes</a></li>

                        <li class="{{ request()->is('search') ? 'uk-active' : '' }}"><a
                                href="{{route('search')}}">Search</a></li>

                        <li class="{{ request()->is('contact') ? 'uk-active' : '' }}"><a
                                href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <div>
                        <a class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
                        <div class="uk-drop uk-background-default"
                            data-uk-drop="mode: click; pos: left-center; offset: 0">
                            <form class="uk-search uk-search-navbar uk-width-1-1">
                                <input class="uk-search-input uk-text-demi-bold" type="search" placeholder="Search..."
                                    autofocus>
                            </form>
                        </div>
                    </div>
                    @guest('user')
                        <!-- Display when the user is not authenticated -->
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li
                                class="{{ request()->is('user.register') || request()->is('user.login') ? 'uk-active' : '' }}">
                                <a href="{{ route('user.register') }}">Sign In</a>
                            </li>
                        </ul>
                        <div class="uk-navbar-item">
                            <div><a class="uk-button uk-button-primary" href="{{ route('user.login') }}">Login</a></div>
                        </div>
                    @endguest

                    @auth('user')
                        <!-- Display when the user is authenticated -->
                        <div class="uk-navbar-item uk-visible@m">
                            <div class="uk-inline">
                                <button class="uk-button uk-button-primary" type="button">Dashboard</button>
                                <div uk-dropdown="mode: hover; delay-hide: 200">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                        <li><a href="{{ route('user.settings') }}">Settings</a></li>
                                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li>
                                            <a href="{{ route('user.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth




                    <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
                            data-uk-navbar-toggle-icon></span></a>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>