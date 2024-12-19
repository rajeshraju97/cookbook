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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Add these to your main layout (e.g., app.blade.php) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

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
                <li><a href="{{route('recipe')}}">Recipe</a></li>
                <li><a href="{{route('search')}}">Search</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('user.register')}}">Register</a></li>
                <li><a href="{{route('user.login')}}">Login</a></li>
            </ul>
            <div class="uk-margin-medium-top">
                <a class="uk-button uk-width-1-1 uk-button-primary" href="{{route('user.login')}}">Login</a>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>



    <script>
        $(document).ready(function () {
            // Success notification
            @if(session('success'))

                content.message = "{{session('success')}}";
                content.title = "Success";
                content.icon = "fa fa-bell";
                $.notify(content, {
                    type: state,
                    placement: {
                        from: placementFrom,
                        align: placementAlign,
                    },
                    time: 1000,
                    delay: 0,
                });
            @endif

            // Error notification
            @if($errors->any())
                $.notify(
                    {
                        message: "{{ $errors->first() }}",
                        title: "Error",
                        icon: "fa fa-exclamation-circle",
                    },
                    {
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
                    }
                );
            @endif
        });
    </script>




</body>

</html>