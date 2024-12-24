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
    <style>
        /* Badge styling */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: red;
            color: white;
            font-size: 12px;
            padding: 3px 6px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            animation: shake 0.1s ease-in-out;
        }

        /* Bounce animation for the badge */
        @keyframes shake {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        /* Trigger animation class */
        .bounce-once {
            animation: bounce 0.5s ease-in-out;
        }

        /* Ensure proper spacing for the cart icon */
        .cart-container {
            margin-right: 10px;
            cursor: pointer;
        }
    </style>


</head>

<body>

    <nav class="uk-navbar-container uk-letter-spacing-small">
        <div class="uk-container">
            <div class="uk-position-z-index" data-uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="{{url('/')}}">Cookbook</a>
                    <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
                        <li class="{{ request()->is('/') ? 'uk-active' : '' }}"><a href="{{url('/')}}">Home</a></li>

                        <li class="{{ request()->is('recipe_index') ? 'uk-active' : '' }}"><a
                                href="{{route('recipe_index')}}">Receipes</a></li>

                        <li class="{{ request()->is('search') ? 'uk-active' : '' }}"><a
                                href="{{route('search')}}">Search</a></li>

                        <li class="{{ request()->is('contact') ? 'uk-active' : '' }}"><a
                                href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right">

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
                                        <div class="cart-container" style="position: relative; display: inline-block;">
                                            <a href="{{route('user.cart')}}">
                                                <span data-uk-icon="icon: cart; ratio: 1.5" class="cart-icon"></span>
                                                <span class="uk-badge cart-badge">
                                                    {{ auth('user')->check() ? \App\Models\Order::where([
                            'user_id' => auth('user')->id(),
                            'status' => 'cart'
                        ])->count() : 0 }}
                                                </span>
                                            </a>

                                        </div>
                                        <!-- Display when the user is authenticated -->
                                        <div class="uk-navbar-item uk-visible@m">
                                            <div class="uk-inline">
                                                <button class="uk-button uk-button-primary"
                                                    type="button">{{auth('user')->user()->username}}</button>
                                                <div uk-dropdown="mode: hover; delay-hide: 200">
                                                    <ul class="uk-nav uk-dropdown-nav">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartBadge = document.querySelector('.cart-badge');

            // Trigger the bounce animation every 5 seconds
            setInterval(() => {
                cartBadge.classList.add('bounce-once');
                setTimeout(() => cartBadge.classList.remove('bounce-once'), 500);
            }, 5000);
        });
    </script>
</body>

</html>