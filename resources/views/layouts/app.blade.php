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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{--    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/libs-support.css">--}}
    {{--    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/style.css">--}}
    {{--    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/responsive.css">--}}
    {{--    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/contact.css">--}}

    <!-- New User review stylesheet -->
    {{--    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/simple-lib-css/simple-lib.css">--}}
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

<!-- Main Wrapper -->
<div class="main" role="main">
    <div class="bg-second-block">

        <div class="container">
            @yield('content')
        </div>

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
