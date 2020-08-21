<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ата жолы - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    @stack('css')
    <link rel="stylesheet" href="{{asset('bastyq/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('bastyq/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini text-sm ">
<!-- Site wrapper -->
<div class="wrapper">

@include('admin.layouts.partials.top_navbar')


<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin/" class="brand-link">
            <img src="{{asset('bastyq/img/AdminLTELogo.png')}}"
                 alt="Ата жолы"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">АТА ЖОЛЫ</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('bastyq/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>
            @include('admin.layouts.partials.nav')


        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong class="text-center">Copyright &copy; 2009-2020 <a href="http://atazholy.kz">Ата жолы</a>.</strong>
    </footer>


</div>
<!-- ./wrapper -->

<script src="{{asset('bastyq/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('bastyq/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@stack('js')
<script src="{{asset('bastyq/js/adminlte.min.js')}}"></script>
</body>
</html>
