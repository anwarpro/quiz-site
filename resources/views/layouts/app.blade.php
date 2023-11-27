<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Programming Hero | Personalized Way To Learn Programming</title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://www.programming-hero.com/assets/img/logo/Programming-Hero-app.png"
          type="img/favicon">
    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Source+Sans+Pro:600,700" rel="stylesheet">

    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/libs-support.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/style.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/responsive.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/contact.css">

    <!-- New User review stylesheet -->
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/simple-lib-css/simple-lib.css">
    <style>
        body, html {
            height: 100% !important;
        }

        .container {
            min-height: 100%;
        }
    </style>

    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 150px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 150px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 150px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 150px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 150px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>

    @stack('css')
</head>
<body id="app" class="ui-transparent-nav">

<!-- Navbar Fixed + Default -->
<nav class="navbar navbar-fixed-top navbar-light bg-white transparent">
    <div class="container">

        <!-- Navbar Logo -->
        <a class="ui-variable-logo navbar-brand" href="/" title="Programming Hero" style="width: 275px;">
            <img class="logo-default" src="https://www.programming-hero.com/assets/img/logo/logo.png"
                 alt="Programming Hero LOGO" data-uhd="">
            <img class="logo-transparent" src="https://www.programming-hero.com/assets/img/logo/logo.png" alt="LOGO"
                 data-uhd="">
        </a>
        <div class="ui-navigation navbar-center">
            <ul class="nav navbar-nav">
                <li style="opacity: 1;">
                    <a href="https://programming-hero.com/blog/Learn-and-Master-Python-in-a-Month.html">Paths be a
                        Hero</a>
                </li>

                <li style="opacity: 1;"><a href="#">Playground</a>
                    <ul class="sub_menu">
                        <li style="opacity: 1;">
                            <a href="https://programming-hero.com/code-playground/python/index.html">Python
                                Playground</a>
                        </li>
                        <li style="opacity: 1;">
                            <a href="https://programming-hero.com/code-playground/web/index.html">Web Playground</a>
                        </li>
                    </ul>
                </li>
                <li style="opacity: 1;"><a href="https://programming-hero.com/blog/index.html">Blog</a></li>
                <li style="opacity: 1;"><a href="https://programming-hero.com/services/buddy.html">Coding Buddy</a></li>
                <li style="opacity: 1;"><a class="letsstart"
                                           href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp">Let's
                        start</a></li>
                <li style="opacity: 1;"><a class="watchmore" href="#myModal" data-toggle="modal">Watch Video</a></li>

                @guest
                    <li style="opacity: 1;"><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li style="opacity: 1;">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest

                <li class="letstart" style="opacity: 1;">
                    <div>
                        <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                           target="_blank" id="let-start" class="letsStart btn ui-gradient-green">Let's start</a>
                    </div>
                </li>
                <li class="load" style="opacity: 1;">
                    <div><a href="#myModal" data-toggle="modal"><i
                                class="fa fa-play-circle animated fa-3x fa-3x"></i></a></div>
                </li>
            </ul>
        </div>

        <!-- Navbar Navigation -->


        <!-- Navbar Toggle -->

        <a href="#" class="ui-mobile-nav-toggle pull-right">
            <div><span></span><span></span><span></span><span></span></div>
        </a>

    </div>
</nav>

<!-- Main Wrapper -->
<div class="main" role="main">
    <div class="bg-second-block">

        <div class="container">
            @yield('content')
        </div>

        <!--  Waves Footer -->
        <footer class="ui-footer subscribe-footer ui-waves">
            <div class="footer-section">
                <div class="container">
                    <div class="footer-content">
                        <!--  footer touch Section -->
                        <div class="col-md-4 address">
                            <h4 class="headingf">
                                <img class="logo-transparent"
                                     src="https://www.programming-hero.com/assets/img/logo/footer-logo.png" alt="LOGO"
                                     data-uhd="">
                            </h4>
                            <p class="footer-p">
                                Programming Hero is a fun, interactive, visual, and friendly way to learn programming.
                            </p>
                        </div>

                        <div class="col-md-2 footer-li">
                            <ul class="nav navbar-nav">
                                <li><a href="../../team/">About us</a></li>
                                <li><a href="http://www.programming-hero.com/blog/index.html">Blog</a></li>
                                <li><a href="http://www.codinism.com">Account</a></li>
                                <li><a href="../../services/contact.html">Contact</a></li>
                            </ul>
                        </div>

                        <div class="col-md-3 footer-li">
                            <ul class="nav navbar-nav">
                                <li><a href="../../terms/terms.html">Terms</a></li>
                                <li><a href="../../terms/privacy.html">Privacy</a></li>
                                <li><a href="http://www.codinism.com">Help</a></li>
                                <li><a href="http://www.codinism.com">FAQ</a></li>
                            </ul>
                        </div>

                        <!-- Social Icons -->
                        <div class="col-md-3 social-icon">
                            <h4 class="headingf">
                                Follow us
                            </h4>

                            <a class="btn ui-gradient-peach btn-circle shadow-md" target="_blank"
                               href="https://www.instagram.com/programminghero/">
                                <span class="fa fa-instagram"></span></a>

                            <a class="btn ui-gradient-green btn-circle shadow-md" target="_blank"
                               href="https://twitter.com/Proghero">
                                <span class="fa fa-twitter"></span></a>

                            <a class="btn ui-gradient-blue btn-circle shadow-md" target="_blank"
                               href="https://www.facebook.com/programmingHero">
                                <span class="fa fa-facebook"></span></a>

                            <a href="http://www.codinism.com/" class="btn ui-gradient-purple btn-circle shadow-md">
                                <span class="fa fa-globe"></span></a>

                        </div>
                    </div>

                </div>
                <!-- .container -->
            </div>
        </footer>

    </div>
    <!-- .main -->
</div>

<!-- Scripts -->
<script type="text/javascript"
        src="https://www.programming-hero.com/assets/js/libs/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://www.programming-hero.com/assets/js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.programming-hero.com/assets/js/libs/wow.min.js"></script>
<script type="text/javascript" src="https://www.programming-hero.com/assets/js/build/js-build.js"></script>
<script type="text/javascript" src="https://www.programming-hero.com/assets/js/libs/theme.js"></script>
<script type="text/javascript" src="https://www.programming-hero.com/assets/css/simple-lib-css/video.js"></script>

@stack('js')

</body>
</html>
