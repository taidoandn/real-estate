@extends('frontend.master')
@section('title','Thông tin tài khoản')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Thông tin cá nhân </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="profile-avatar">
                        <img src="https://demo.themeqx.com/themeqxestate/uploads/avatar/1472334656eic9y-i04.png"
                            class="img-thumbnail img-circle">
                    </div>

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Họ tên</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                            <tr>
                                <th>Thời gian tạo</th>
                                <td>{{ Auth::user()->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('profile.edit') }}"><i class="fa fa-pencil-square-o"></i> Chỉnh sửa </a>
                </div>
            </div>
        </div> <!-- /#page-wrapper -->
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });

</script>
@endpush
