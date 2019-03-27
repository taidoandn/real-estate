<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{  asset('layout/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{  asset('layout/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('layout/backend/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{  asset('layout/backend/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{  asset('layout/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{  asset('layout/backend/css/toastr.min.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        var base_url = {!! json_encode(url('/')) !!};
    </script>
    @stack('css')
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

    <div class="wrapper">
        <header class="main-header">
            @include('backend.partial.header')
        </header>

        <aside class="main-sidebar">
            @include('backend.partial.navbar')
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="{{  asset('layout/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{  asset('layout/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{  asset('layout/backend/js/adminlte.min.js') }}"></script>
    <script src="{{  asset('layout/backend/js/toastr.min.js') }}"></script>
    @if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}","Success Alert");
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.success("{{ Session::get('error') }}","Error Alert");
    </script>
    @endif
    @stack('script')
</body>

</html>
