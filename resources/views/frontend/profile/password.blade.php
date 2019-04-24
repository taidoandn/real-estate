@extends('frontend.master')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper" style="min-height: 546px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Change Password </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-sm-8 col-sm-offset-1 col-xs-12">
                    <form method="POST" action="{{ route('profile.post-change-pass') }}" accept-charset="UTF-8" class="form-horizontal">
                        @csrf
                        <div class="form-group {{ $errors->has('old_password') ? 'has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="old_password">Mật khẩu cũ*</label>
                            <div class="col-sm-9">
                                <input type="password" name="old_password" id="old_password" class="form-control"
                                    value="" autocomplete="off" placeholder="Mật khẩu cũ ">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('old_password') }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="new_password">Mật khẩu mới *</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    value="" autocomplete="off" placeholder="Mật khẩu mới">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('new_password') }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="new_password_confirmation">Xác nhận *</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" value="" autocomplete="off"
                                    placeholder="Xác nhận">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('new_password_confirmation') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-10">
                                <button type="submit" class="btn btn-info">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
