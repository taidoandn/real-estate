<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Website Bất động sản </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/bootstrap-theme.min.css') }}">

    <!-- Font awesome 4.4.0 -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100">
    <!-- main select2.css -->
    <link href="{{ asset('layout/frontend/select2-3.5.3/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('layout/frontend/select2-3.5.3/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/nprogress/nprogress.css') }}">

    <!-- main style.css -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/fotorama-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/owl.carousel.css') }}">


    @stack('css')
</head>

<body>

    @include('frontend.partial.header')

    <div class="container">
        @yield('content')
    </div> <!-- /#container -->

    @include('frontend.partial.footer')


    {{-- <script data-cfasync="false" src="{{ asset('layout/frontend/js/email-decode.min.js') }}"></script> --}}
    <script src="{{ asset('layout/frontend/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/select2-3.5.3/select2.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('layout/frontend/js/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/owl.carousel.min.js') }}"></script>

    <script type="text/javascript">
        NProgress.start();
        NProgress.done();
    </script>

    <!-- Conditional page load script -->
    <script src="{{ asset('layout/frontend/js/main.js') }}"></script>
    @stack('js')

</body>

</html>
