<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<title>Ата жолы - бабалар салған ізбенен...</title>--}}
    <title>@yield('title') - {{ config('app.subtitle') }}</title>
    <meta name="description"
          content="Ата және жол ұғымдарының қосарлана аталуынан-ақ түсінікті. Ата –бабаларымыздың меңгерген ғылымы – Ілім мен Білім ортасымен байланысты екені. Салт-дәстүрдің дінмен байланыса, қабаттаса құбылуынан болған дүние. Тылсым дүниемен, Аруақ ұғымымен тікелей байланысты.">
    <meta name="keywords"
          content="Ата жолы, аруақ, тылсым дүние, тылсым құбылыстар, түс көру, түс жору, салт дәстүр, ата, баба, ана, әдебиет, тарих, би, шешен, жиренше, әулие, ұлттық, хан, дін, ислам, қазақ"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta property="og:image" content="img/@1x/preview.jpg">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <style>body {
            opacity: 0;
            overflow-x: hidden;
        }

        html {
            background-color: #a5c8e8;
        }</style>
</head>

<body class="ishome">
<div class="preloader">
    <div class="pulse"></div>
</div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <div class="row no-gutters w-100">
            <div class="col-auto social-buttons">
                <a href="#" target="_blank" class="btn-floating btn-lg btn-fb" role="button"><i
                            class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="btn-floating btn-lg btn-tw" role="button"><i
                            class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="btn-floating btn-lg btn-yt" role="button"><i
                            class="fab fa-youtube"></i></a>
                <a href="#" target="_blank" class="btn-floating btn-lg btn-reddit" role="button"><i
                            class="fab fa-telegram"></i></a>
            </div><!-- /.social-buttons -->

            <div class="col-2 col-lg-auto ml-auto  d-flex justify-content-end align-items-center position-static ">
                <div class="collapse-menu">
                    <a href="#" class="menu-btn">
                        <span></span>
                    </a>
                </div>
                <div class="collapse navbar-collapse menu-nav" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#home">Басқы бет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#books">Кітапхана</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#atazholy">Ата жолы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#aqul">Ақ Ұл</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Байланыс</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.col -->
        </div><!--/.row-->
    </div><!-- /.container -->
</nav>
<!-- Masthead -->
<header id="home" class="masthead section-overlay">
{{--***--}}
<!-- Right Side Of Navbar -->

    {{--****--}}
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <ul style="position: relative;" class="d-flex">
                @foreach (config('app.locales') as $locale)
                    <li class="nav-item" style="margin: 0 1rem;">
                        <a class="nav-link"
                           href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                           @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase font-weight-bold">{{ __('landing.header_title') }}</h1>
                <h3 class="mt-lg-3 mt-2 ">{{ __('landing.header_subtitle_h3') }}</h3>
                <hr class="divider my-lg-5 my-3">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <h2 class="mb-5">{{ __('landing.header_subtitle_h2') }}</h2>
                <!--<a class="btn btn-primary btn-xl js-scroll-trigger" href="#books">Кітаптар</a>-->
            </div>
        </div>
    </div>
</header>

@yield('content')

<!-- Footer -->
<footer class="section-overlay py-lg-5 py-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12 pb-3 pb-lg-0">
                <p class="about-header text-white text-center">Сайт материалдарын пайдалану шарты:</p>
                <p class="about-text text-white-75 text-center">
                    Көшіріп басу, сілтеме беру, материалды жариялау (фото,видео,аудио жазбаларды қоса) atazholy.kz
                    сайтындағы
                    мақала авторының хат түріндегі рұқсаты берілгеннен кейін ғана жүзеге асырылады. Үшінші тараптың
                    жарияланымды
                    пайдалану құқығы тек рұқсат етілген жағдайда ғана жүзеге асырылады. Байланысу үшін арнайы <a
                            href="https://blogs.atazholy.kz/bajlanysu/" target="_blank"><strong>нысанды</strong></a>
                    пайдаланыңыз.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-12 mb-3 mb-lg-0">
                <div class="col-auto social-buttons">
                    <!--Facebook-->
                    <a href="#" target="_blank" class="btn-floating btn-lg btn-fb" role="button"><i
                                class="fab fa-facebook-f"></i></a>
                    <!--Twitter-->
                    <a href="#" target="_blank" class="btn-floating btn-lg btn-tw" role="button"><i
                                class="fab fa-twitter"></i></a>
                    <!--Youtube-->
                    <a href="#" target="_blank" class="btn-floating btn-lg btn-yt" role="button"><i
                                class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="btn-floating btn-lg btn-reddit" role="button"><i
                                class="fab fa-telegram"></i></a>
                </div><!-- /.social-buttons -->
            </div>
        </div>

    </div>
</footer>

{{--<link rel="stylesheet" href="css/styles.min.css">--}}
<link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>