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
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <meta property="og:image" content="i{{ asset('img/og-image_1.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <style>body {
            opacity: 1;
            overflow-x: hidden;
        }

        html {
            background-color: #fff;
        }</style>
</head>

<body class="ishome">
<div class="preloader">
    <div class="pulse"></div>
</div>



@yield('content')

<!-- Footer -->

{{--<link rel="stylesheet" href="css/styles.min.css">--}}
<link href="{{ asset('books/css/styles2.min.css') }}" rel="stylesheet">
<link href="{{ asset('books/css/style.css') }}" rel="stylesheet">
<script src="{{asset('books/js/scripts2.min.js')}}"></script>
<script>
    $(function () {

//        $('a.get-book').click(function () {
        $('.mm-listitem').on('click','a.get-book',function () {
            event.preventDefault();
           /* alert(1);
            $(this).addClass('finished');*/
            if(!$(this).hasClass("finished")) {
                let url = $(this).attr('href');
                $(this).addClass('finished');
                $('a.get-book').not(this).removeClass("finished");
                // let slug = $(this).data('slug');
                $.ajax({
                    url: url,
                    type: 'GET',
                    // data: {slug: slug},
                    success: function (response) {
                        history.pushState('', '', url);
                        $('#response').html(response);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
            return false; // for good measure
        });

    });
</script>
</body>
</html>