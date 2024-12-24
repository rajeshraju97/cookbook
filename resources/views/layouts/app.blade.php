<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <title>@yield('title', 'Cookbook')</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <script src="{{asset('js/main.js')}}"></script>



    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins.min.css')}}" />


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('css/demo.css')}}" />
    <!-- Add these to your main layout (e.g., app.blade.php) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <script src="{{asset('js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{asset('css/fonts.min.css')}}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

</head>

<body>

    @yield('content')



    <footer class="uk-section uk-section-default">
        <div class="uk-container uk-text-secondary uk-text-500">
            <div class="uk-child-width-1-2@s" data-uk-grid>
                <div>
                    <a href="{{url('/')}}" class="uk-logo">Cookbook</a>
                </div>
                <div class="uk-flex uk-flex-middle uk-flex-right@s">
                    <div data-uk-grid class="uk-child-width-auto uk-grid-small">
                        <div>
                            <a href="https://www.facebook.com/" data-uk-icon="icon: facebook; ratio: 0.8"
                                class="uk-icon-button facebook" target="_blank"></a>
                        </div>
                        <div>
                            <a href="https://www.instagram.com/" data-uk-icon="icon: instagram; ratio: 0.8"
                                class="uk-icon-button instagram" target="_blank"></a>
                        </div>
                        <div>
                            <a href="mailto:info@blacompany.com" data-uk-icon="icon: twitter; ratio: 0.8"
                                class="uk-icon-button twitter" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
                <div>
                    <ul class="uk-list uk-text-small">
                        <li><a class="uk-link-text" href="#">Presentations</a></li>
                        <li><a class="uk-link-text" href="#">Professionals</a></li>
                        <li><a class="uk-link-text" href="#">Stores</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="uk-list uk-text-small">
                        <li><a class="uk-link-text" href="#">Webinars</a></li>
                        <li><a class="uk-link-text" href="#">Workshops</a></li>
                        <li><a class="uk-link-text" href="#">Local Meetups</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="uk-list uk-text-small">
                        <li><a class="uk-link-text" href="#">Our Initiatives</a></li>
                        <li><a class="uk-link-text" href="#">Giving Back</a></li>
                        <li><a class="uk-link-text" href="#">Communities</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="uk-list uk-text-small">
                        <li><a class="uk-link-text" href="#">Contact Form</a></li>
                        <li><a class="uk-link-text" href="#">Work With Us</a></li>
                        <li><a class="uk-link-text" href="#">Visit Us</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="uk-margin-medium-top uk-text-small uk-text-muted text-center">
                <div>Made by <a class="uk-link-muted fw-bold text-dark " href="#" target="_blank">Cookbook</a></div>
            </div>
        </div>
    </footer>

    <div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">
            <a class="uk-logo" href="{{url('/')}}">Cookbook</a>
            <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
            <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
                <li class="uk-active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('recipe_index')}}">Recipe</a></li>
                <li><a href="{{route('search')}}">Search</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                @guest('user')
                    <li><a href="{{route('user.register')}}">Register</a></li>
                    <li><a href="{{route('user.login')}}">Login</a></li>
                @endguest

            </ul>
            @guest('user')
                <div class="uk-margin-medium-top">
                    <a class="uk-button uk-width-1-1 uk-button-primary" href="{{route('user.login')}}">Login</a>
                </div>
            @endguest
            @auth('user')
                <!-- Display when the user is authenticated -->
                <div class="uk-margin-medium-top">

                    <button class="uk-button uk-width-1-1 uk-button-primary"
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

                <!-- Logout Form -->
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
            <div class="uk-margin-medium-top uk-text-center">
                <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
                    <div>
                        <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link"
                            target="_blank"></a>
                    </div>
                    <div>
                        <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link"
                            target="_blank"></a>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link"
                            target="_blank"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function () {
            // Success notification
            @if(session('success'))
                var content = {
                    message: "{{ session('success') }}",
                    title: "Success",
                    icon: "fa fa-bell"
                };

                $.notify(content, {
                    type: 'success', // You can change this to match your notification type
                    placement: {
                        from: 'top', // Correct capitalization
                        align: 'right' // Correct capitalization
                    },
                    time: 1000,
                    delay: 5000, // Adjust delay if needed
                });
            @endif
            // Error notification
            @if($errors->any())
                var content = {
                    message: "{{ $errors->first() }}",
                    title: "Error",
                    icon: "fa fa-exclamation-circle",
                };

                $.notify(content, {
                    type: "danger", // Error style
                    allow_dismiss: true,
                    delay: 5000,
                    placement: {
                        from: "top",
                        align: "right",
                    },
                    offset: { x: 20, y: 70 },
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                });
            @endif

        });
    </script>

    <!--   Core JS Files   -->
    <script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('js/setting-demo.js')}}"></script>
    <script src="{{asset('js/demo.js')}}"></script>




</body>

</html>