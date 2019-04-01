@extends('frontend.master')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Profile </h1>
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
                                <th>Name</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ Auth::user()->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('profile.edit') }}"><i class="fa fa-pencil-square-o"></i> Edit </a>
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
