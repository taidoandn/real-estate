<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Website Bất động sản | @yield('title') </title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/bootstrap-theme.min.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- Font awesome 4.7.0 -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/css.css') }}">
    <!-- main select2.css -->
    <link href="{{ asset('layout/frontend/select2-3.5.3/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('layout/frontend/select2-3.5.3/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/nprogress/nprogress.css') }}">

    <!-- main style.css -->
    <link rel="stylesheet" href="{{ asset('layout/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/frontend/plugins/owl.carousel.css') }}">
    <script src="{{ asset('layout/frontend/js/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <script type="text/javascript">
        var base_url = {!! json_encode(url('/')) !!};
    </script>
    @stack('css')
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
    <div class="header-nav-top">
        @include('frontend.partial._header')
    </div>

    <nav class="navbar navbar-default" role="navigation">
        @include('frontend.partial._navbar')
    </nav>

    @yield('content')

    <div class="modern-post-ad-call-to-cation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Want to sell your property quickly?</h1>
                    <p>Post your ad quickly, your personal data secured with us</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-info btn-lg">Post an ad</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        @include('frontend.partial._footer')
    </div>

    <div id="loadingOverlay" style="display: none;">
        <div class="circleLoader"></div>
        <p>Loading...</p>
    </div>


    {{-- <script data-cfasync="false" src="{{ asset('layout/frontend/js/email-decode.min.js') }}"></script> --}}
    <script src="{{ asset('layout/frontend/js/vendor/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/select2-3.5.3/select2.min.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('layout/frontend/plugins/owl.carousel.min.js') }}"></script>
    <script>
        var district_id;
    </script>
    <script>
        function getDistrict(city_id,district_id = null){
            $.ajax({
                type : 'get',
                url : '{{ route('ajax.districts') }}',
                data : { city_id : city_id },
                success : function (data) {
                    var options = '';
                    options += '<option value="" selected> Chọn Quận/huyện </option>';
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            options += "<option value='" + value.id + "'>" + value.name + "</option>";
                        });
                        $('select[name="district_id"]').html(options);
                        $('select[name="district_id"]').select2();
                        $('select[name="district_id"]').val(district_id).change();
                    }else {
                        $('select[name="district_id"]').html(options);
                        $('select[name="district_id"]').select2();
                    }
                }
            });
        }
    </script>
    @stack('js')

    <script type="text/javascript">
        NProgress.start();
        NProgress.done();
    </script>

    <!-- Conditional page load script -->
    <script src="{{ asset('layout/frontend/js/main.js') }}"></script>
    @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script> toastr.error("{{ Session::get('error') }}")</script>
    @endif
</body>

</html>
