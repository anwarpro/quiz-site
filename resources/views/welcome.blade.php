<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://www.programming-hero.com/assets/img/logo/Programming-Hero-app.png"
          type="img/favicon">

    <title>Programming Hero | Personalized Way To Learn Programming</title>
    <link href="https://fonts.googleapis.com/css?family=Exo:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Source+Sans+Pro:600,700" rel="stylesheet">

    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/libs-support.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/style.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/style-v3.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/responsive.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/user_review/style.css">
    <link rel="stylesheet" href="https://www.programming-hero.com/assets/css/simple-lib-css/simple-lib.css">
</head>
<body class="ui-transparent-nav">

<nav class="navbar navbar-fixed-top navbar-light bg-white">
    <div class="container">

        <a class="ui-variable-logo navbar-brand" href="index.html" title="Programming Hero" style="width: 338px;">
            <img class="logo-default"
                 src="https://www.programming-hero.com/assets/img/hero-header/iphone/programming-hero-logo.png"
                 alt="Programming Hero LOGO" data-uhd="">
            <img class="logo-transparent"
                 src="https://www.programming-hero.com/assets/img/hero-header/iphone/programming-hero-logo.png"
                 alt="LOGO" data-uhd="">
        </a>
        <div class="ui-navigation navbar-center">
            <ul class="nav navbar-nav">
                <li style="opacity: 1;">
                    <a href="https://bangla.programming-hero.com/">Course</a>
                </li>

                <li style="opacity: 1;"><a href="#">Playground</a>
                    <ul class="sub_menu">
                        <li style="opacity: 1;">
                            <a href="https://www.programming-hero.com/code-playground/python/index.html">Python
                                Playground</a>
                        </li>
                        <li style="opacity: 1;">
                            <a href="https://www.programming-hero.com/code-playground/web/index.html">Web Playground</a>
                        </li>
                    </ul>
                </li>
                <li style="opacity: 1;"><a href="https://www.programming-hero.com/blog/index.html">Blog</a></li>
                <li style="opacity: 1;"><a href="https://www.programming-hero.com/services/buddy.html">Coding Buddy</a>
                </li>

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

                <li style="opacity: 1;"><a class="letsstart"
                                           href="https://apps.apple.com/us/app/programming-hero-coding-fun/id1478201849?ls=1">Let's
                        start</a></li>
                <li style="opacity: 1;"><a class="watchmore" href="#myModal" data-toggle="modal">Watch Video</a></li>
                <li class="letstart" style="opacity: 1;">
                    <div><a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                            target="_blank" id="let-start" class="letsStart btn ui-gradient-green">Let's start</a>
                    </div>
                </li>
                <li class="load" style="opacity: 1;">
                    <div><a href="#myModal" data-toggle="modal"><i
                                class="fa fa-play-circle animated fa-3x fa-3x"></i></a></div>
                </li>
            </ul>
        </div>

        <a href="#" class="ui-mobile-nav-toggle pull-right">
            <div><span></span><span></span><span></span><span></span></div>
        </a>

    </div>
</nav>

<div class="main" role="main">

    <div class="headerbg">
        <div class="ui-hero ui-hero-slider slider-pro hero-lg ui-gradient-purple ui-waves hero-svg-layer-1"
             data-show_arrows="false" style="margin: 0;">
            <div class="sp-slides">

                <div class="iphoneheader">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 headerdiv wow  fadeInLeft   animated" data-wow-duration="1.5s"
                                 data-wow-delay="0.35s"
                                 style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">

                                <h1 class="heading sp-layer hero-text">Programming Just Got Fun </h1>
                                <p class="paragraph sp-layer">
                                    Enjoy a personalized, fun, and interactive learning <br> process while becoming a
                                    Programming Hero.
                                </p>
                                <div class="actions sp-layer wow  fadeInUp action-to-app-store" data-wow-duration="1.5s"
                                     data-wow-delay="1.3s"
                                     style="visibility: visible; animation-duration: 1.5s; animation-delay: 1.3s; animation-name: fadeInUp; display: inline-flex;">
                                    <a href="https://apps.apple.com/us/app/programming-hero-coding-fun/id1478201849?ls=1"
                                       target="_blank" style="padding-right: 10px;">
                                        <img
                                            src="https://www.programming-hero.com/assets/img/hero-header/iphone/app-store-logo.png"
                                            class="responsive-on-sm" alt="Programming Hero">
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                                       target="_blank">
                                        <img
                                            src="https://www.programming-hero.com/assets/img/hero-header/programming-hero-google_play.png"
                                            class="responsive-on-sm" alt="Programming Hero">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 sp-layer bounce-animate">
                                <a href="https://apps.apple.com/us/app/programming-hero-coding-fun/id1478201849?ls=1"
                                   target="_blank">
                                    <img
                                        src="https://www.programming-hero.com/assets/img/hero-header/iphone/programming-hero.png"
                                        class="responsive-on-sm moc-up" alt="Programming Hero"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-second-block">

        <div class="featured-section-2 featured-1">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center wow  fadeInUp  animated" data-wow-duration="1.5s"
                             data-wow-delay="0.35s"
                             style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInUp;">
                            <h2>Programming Just Got Fun 🚀</h2>
                            <p style="padding-bottom: 25px;font-size: 20px;padding-top: 10px;"><br><br></p>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="featured-details-one wow  fadeInLeft   animated" data-wow-duration="1.5s"
                             data-wow-delay="0.35s"
                             style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                            <div class="media features-card">
                                <div class="media-left">
                                    <div class="thumb">
                                        <img
                                            src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(4).png"
                                            alt="icon">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3>Build your own game</h3>
                                    <p>After learning each programming concept, you will add an element to your game
                                        while learning</p>
                                </div>
                            </div>
                        </div>

                        <div class="featured-details-one wow  fadeInLeft  animated" data-wow-duration="1.5s"
                             data-wow-delay="0.35s"
                             style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                            <div class="media features-card">
                                <div class="media-left">
                                    <div class="thumb">
                                        <img
                                            src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(6).png"
                                            alt="icon">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3>Learn in a fun way</h3>
                                    <p>We trashed all the hard, boring tutorials out there.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 sp-layer" style="text-align: center;">
                        <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                           target="_blank">
                            <img src="https://www.programming-hero.com/assets/img/hero-header/iphone/10245.png"
                                 class="responsive-on-sm features-mobile-frame" alt="Programming Hero"></a>
                    </div>

                </div>
            </div>
        </div>


        <div class="bg-second-block">

            <div class="featured-section-2 featured-2">
                <div class="container">
                    <div class="row">

                        <div class="col-md-7 sp-layer" style="text-align: left;">
                            <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                               target="_blank">
                                <img
                                    src="https://www.programming-hero.com/assets/img/hero-header/iphone/features-v2.png"
                                    class="responsive-on-sm features-mobile-frame" alt="Programming Hero"></a>
                        </div>

                        <div class="col-md-5">
                            <div class="featured-details-one wow  fadeInLeft   animated" data-wow-duration="1.5s"
                                 data-wow-delay="0.35s"
                                 style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                                <div class="media features-card">
                                    <div class="media-left">
                                        <div class="thumb">
                                            <img
                                                src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(1).png"
                                                alt="icon">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h3>Gain superpowers</h3>
                                        <p>Surprise points and gifts will make your learning very enjoyable</p>
                                    </div>
                                </div>
                            </div>

                            <div class="featured-details-one wow  fadeInLeft  animated" data-wow-duration="1.5s"
                                 data-wow-delay="0.35s"
                                 style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                                <div class="media features-card">
                                    <div class="media-left">
                                        <div class="thumb">
                                            <img
                                                src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(5).png"
                                                alt="icon">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h3>Code.org Winner</h3>
                                        <p>Programming Hero is the selected learning app for #1 programming promoting
                                            organization.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="bg-second-block">

                <div class="featured-section-2 featured-3">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="featured-details-one wow  fadeInLeft   animated" data-wow-duration="1.5s"
                                     data-wow-delay="0.35s"
                                     style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                                    <div class="media features-card">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <img
                                                    src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(5).png"
                                                    alt="icon">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h3>Beginner friendly</h3>
                                            <p>Get help from thousands of learners in the Forum</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="featured-details-one wow  fadeInLeft  animated" data-wow-duration="1.5s"
                                     data-wow-delay="0.35s"
                                     style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInLeft;">
                                    <div class="media features-card">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <img
                                                    src="https://www.programming-hero.com/assets/img/mobile-moc/circle-icon/icon(3).png"
                                                    alt="icon">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h3>Become a master</h3>
                                            <p>When you will be done with this app, you will master programming
                                                fundamentals.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 sp-layer" style="text-align: center;">
                                <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                                   target="_blank">
                                    <img
                                        src="https://www.programming-hero.com/assets/img/hero-header/iphone/features-v3.png"
                                        class="responsive-on-sm features-mobile-frame" alt="Programming Hero"></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="features-section">
                    <div class="container">
                        <div class="features-section-overlay">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="iphone-store">
                                        <img
                                            src="https://www.programming-hero.com/assets/img/hero-header/iphone/iphone-stoer.png"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-7 headerdiv wow  fadeInRight  animated" data-wow-duration="1.5s"
                                     data-wow-delay="0.35s"
                                     style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.35s; animation-name: fadeInRight;">
                                    <h1 class="heading sp-layer hero-text app-store-header">
                                        Download the app now
                                    </h1>
                                    <p class="paragraph sp-layer app-store-sub-heading">
                                        Enjoy personalized, fun, and interactive learning process while becoming
                                        a Programming Hero.
                                    </p>
                                    <div class="actions sp-layer wow  fadeInUp action-to-app-store"
                                         data-wow-duration="1.5s" data-wow-delay="1.3s"
                                         style="visibility: visible; animation-duration: 1.5s; animation-delay: 1.3s; animation-name: fadeInUp; display: inline-flex;">
                                        <a href="https://apps.apple.com/us/app/programming-hero-coding-fun/id1478201849?ls=1"
                                           target="_blank" style="padding-right: 10px;">
                                            <img
                                                src="https://www.programming-hero.com/assets/img/hero-header/iphone/app-store-logo.png"
                                                class="responsive-on-sm" alt="Programming Hero">
                                        </a>
                                        <a href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp"
                                           target="_blank">
                                            <img
                                                src="https://www.programming-hero.com/assets/img/hero-header/programming-hero-google_play.png"
                                                class="responsive-on-sm" alt="Programming Hero">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="review-section">
                    <div class="overlay pt-100 pb-100">
                        <div class="container">
                            <div class="row">
                                <div class="cards-5 section-gray">

                                    <div class="col-lg-12">
                                        <div class="user-review-title title-bg">
                                            <h2 class="wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s"
                                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                                User Reviews!</h2>
                                            <p>In just 14 months, we got 11k+ reviews! :D <br> If you have
                                                nothing
                                                else
                                                to
                                                do, read our <a style="color: #389bf4;" target="_blank"
                                                                href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp&amp;showAllReviews=true">awesome
                                                    reviews!</a></p>
                                        </div>
                                    </div>
                                    <div id="testimonial-slider" class="owl-carousel owl-theme"
                                         style="opacity: 1; display: block;">
                                        <div class="owl-wrapper-outer">
                                            <div class="owl-wrapper"
                                                 style="width: 5850px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-1170px, 0px, 0px);">
                                                <div class="owl-item" style="width: 585px;">
                                                    <div class="review-item">
                                                        <div class="card card-profile">
                                                            <div class="card-avatar one">
                                                                <a href="#"> <img class="img"
                                                                                  src="https://lh3.googleusercontent.com/a-/AAuE7mBXfXEnWHLYCW5sNiGKc2mxOTdW5hkxgo1xpwIeDA">
                                                                </a>
                                                            </div>
                                                            <div class="table">
                                                                <h4 class="card-caption">Edwin Jr</h4>

                                                                <ul class="rating list-inline font-14">
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <p class="card-description">It helps me a lot specially
                                                                    when
                                                                    you
                                                                    are
                                                                    a
                                                                    refresher. Great job for those who develop this kind
                                                                    of
                                                                    game.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 585px;">
                                                    <div class="review-item">
                                                        <div class="card card-profile">
                                                            <div class="card-avatar" style="background-color: #dbe1fe">
                                                                <a href="#"> <img class="img"
                                                                                  src="https://lh3.googleusercontent.com/a-/AAuE7mBt50kpeke0EcUKkeL4gGMCoAma19bwHqpdRXoIPA">
                                                                </a>
                                                            </div>
                                                            <div class="table">
                                                                <h4 class="card-caption">Chadi Berlin CB</h4>

                                                                <ul class="rating list-inline font-14">
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <p class="card-description">Love it! If you want to
                                                                    begin
                                                                    programming
                                                                    you can use this app to get started it is very easy
                                                                    to
                                                                    understand
                                                                    and specially they use Python3 as we all know
                                                                    Python3 is
                                                                    very
                                                                    easy
                                                                    to learn and thats why this app got 5 Stars. I
                                                                    downloaded
                                                                    for
                                                                    than
                                                                    26 Programming apps and non of them are as good as
                                                                    this
                                                                    on
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 585px;">
                                                    <div class="review-item">
                                                        <div class="card card-profile">
                                                            <div class="card-avatar">
                                                                <a href="#"> <img class="img"
                                                                                  src="https://lh3.googleusercontent.com/a-/AAuE7mC0wpxhjTk6pz-ttzHVU2-FnCMRFQ4VOBJek0AecYY">
                                                                </a>
                                                            </div>
                                                            <div class="table">
                                                                <h4 class="card-caption">Manoley Astosenix</h4>
                                                                <ul class="rating list-inline font-14">
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <p class="card-description">Amazing app to learn to
                                                                    code!!
                                                                    Great
                                                                    experience and content! Everything is explained in
                                                                    simple
                                                                    terms
                                                                    to
                                                                    make you get the concepts and also in detail to get
                                                                    the
                                                                    most
                                                                    out
                                                                    of
                                                                    it. Absolutely recommend to get premium service,
                                                                    even
                                                                    though
                                                                    the
                                                                    free plan is really good too.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 585px;">
                                                    <div class="review-item">
                                                        <div class="card card-profile">
                                                            <div class="card-avatar">
                                                                <a href="#"> <img class="img"
                                                                                  src="https://lh3.googleusercontent.com/a-/AAuE7mAq7Q_NUVl6nb7E-sXBu_6xPu8gS_4S7NJQBm7m">
                                                                </a>
                                                            </div>
                                                            <div class="table">
                                                                <h4 class="card-caption">Monirul Ahasan</h4>

                                                                <ul class="rating list-inline font-14">
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <p class="card-description">Awesome app!!! A very
                                                                    effective
                                                                    learning
                                                                    method has been applied for quick learning. 💎💎💎
                                                                    Playing &amp;
                                                                    learning! What a great fun!! What an excitement!!!
                                                                    Thanks to
                                                                    the
                                                                    Developers of this extraordinary app for their hard
                                                                    work.
                                                                    Play
                                                                    and
                                                                    become a Programming Hero!!! ❤❤❤</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 585px;">
                                                    <div class="review-item">
                                                        <div class="card card-profile">
                                                            <div class="card-avatar">
                                                                <a href="#"> <img class="img"
                                                                                  src="https://lh3.googleusercontent.com/a-/AAuE7mDdjrF5O7jjXDcD9h_PCPkuMLW4NgDUD5TuUdQ8tQ">
                                                                </a>
                                                            </div>
                                                            <div class="table">
                                                                <h4 class="card-caption">Kaitlyn Ray</h4>

                                                                <ul class="rating list-inline font-14">
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <p class="card-description">I love it so far! I've
                                                                    learned
                                                                    more
                                                                    through
                                                                    an hour on this then weeks of learning through other
                                                                    apps.
                                                                    Highly
                                                                    recommend!</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="owl-controls clickable">
                                            <div class="owl-pagination">
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page active"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <footer class="ui-footer subscribe-footer ui-waves">
                    <div class="footer-section">
                        <div class="container">
                            <div class="footer-content">

                                <div class="col-md-4 address">
                                    <h4 class="headingf">
                                        <img class="logo-transparent"
                                             src="https://www.programming-hero.com/assets/img/logo/footer-white-logo.png"
                                             alt="LOGO" data-uhd="">
                                    </h4>
                                    <p class="footer-p">
                                        Programming Hero is a fun, interactive, visual, and friendly way to
                                        learn
                                        programming.
                                    </p>
                                </div>

                                <div class="col-md-2 footer-li">
                                    <ul class="nav navbar-nav">
                                        <li><a href="team/">About us</a></li>
                                        <li><a href="blog/index.html">Blog</a></li>
                                        <li><a href="terms/refund-policy.html">Refund Policy</a></li>
                                        <li><a href="services/contact.html">Contact</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 footer-li">
                                    <ul class="nav navbar-nav">
                                        <li><a href="terms/terms.html">Terms</a></li>
                                        <li><a href="terms/privacy.html">Privacy</a></li>
                                        <li><a href="http://www.codinism.com">Help</a></li>
                                        <li><a href="http://www.codinism.com">FAQ</a></li>
                                    </ul>
                                </div>


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

                                    <a href="http://www.codinism.com/"
                                       class="btn ui-gradient-purple btn-circle shadow-md">
                                        <span class="fa fa-globe"></span></a>

                                </div>
                            </div>


                        </div>
                    </div>
                </footer>


                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://www.youtube.com/embed/Rim14e5_Hwc"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" frameborder="0"></iframe>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"><a class="video-footer"
                                                                                 href="https://play.google.com/store/apps/details?id=com.learnprogramming.codecamp">Let's
                                        Start</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/js/libs/jquery/jquery-3.3.1.min.js"></script>
            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/js/libs/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://www.programming-hero.com/assets/js/libs/wow.min.js"></script>
            <script type="text/javascript" src="https://www.programming-hero.com/assets/js/build/js-build.js"></script>
            <script type="text/javascript" src="https://www.programming-hero.com/assets/js/libs/theme.js"></script>

            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/js/user_review/owl.carousel.min.js"></script>
            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/js/user_review/review.js"></script>
            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/js/libs/owl_carousel.js"></script>
            <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
            </script>

            <script type="text/javascript"
                    src="https://www.programming-hero.com/assets/css/simple-lib-css/video.js"></script>


        </div>
    </div>
</div>
<input id="ext-version" type="hidden" value="1.3.6">
</body>
</html>
