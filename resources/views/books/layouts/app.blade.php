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
            opacity: 1;
            overflow-x: hidden;
        }

        html {
            background-color: #e8a0af;
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

        $('a.get-book').click(function () {
            event.preventDefault();
            let url = $(this).attr('href');
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
            return false; // for good measure
        });

    });
</script>
</body>
</html>