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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          

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

        #blank input {
            text-align: center;
        }
        .quiz-setion-pro{
            background-color:#fff;
            padding: 50px 50px;
            box-shadow: 0px 0px 35px -2px rgba(72, 73, 121, 0.15);
            border-radius: 10px;
        }
        .quiz-setion-pro h4{
            font-size:25px;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
        }
            .quiz-setion-pro p{
                font-size:18px;
                font-family: 'Poppins', sans-serif;
                font-weight: 300;
                padding: 30px 0px 8px 0;
        }
            .quiz-setion-pro .custom-control-label{
                font-size: 17px;
                font-family: 'Poppins', sans-serif;
                font-weight: 300;
                padding-left: 28px;
                position: relative;
                display: inline;
        }
            .check-box-model {
                background-color: #eee;
                margin-bottom: 10px;
                padding: 10px 20px;
            }
        
        .custom-control-label::before {background-color: #607D8B; padding-right:10px;}
            #blank input {
                margin-top: 20px;
                border: 2px solid #eee;
                padding-top: 5px;
                background: #eee;
                border-radius: 5px;
        }

            /* Transition */
            label::after {
              -webkit-transition: .25s all ease;
              transition: .25s all ease;
            }
    
            @media (min-width: 320px) and (max-width: 480px) {
                .quiz-setion-pro {
                    padding: 50px 15px;
                    
                }

            }

    </style>

    @stack('css')
</head>
<body id="app" class="ui-transparent-nav">

<!-- Main Wrapper -->
<div class="container">
    <div class="quiz-setion-pro">
         @yield('content')
    </div>
</div>


<!-- Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Scripts -->
@stack('js')

</body>
</html>
