@extends('frontend.master')
@section('title','Register')
@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-white ">
                <h4><i class="fa fa-edit"></i> </h4>
                <p class="intro"> View, edit and delete your ads. </p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-white ">
                <h4><i class="fa fa-clock-o"></i> </h4>
                <p class="intro"> Quick publish new ads with contact details. </p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-white ">
                <h4><i class="fa fa-bar-chart-o"></i> </h4>
                <p class="intro"> Keep track of your favorite ads. </p>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">Đăng ký | <a href="{{ route('login') }}">Đăng nhập</a> </h3>
                <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" role="form">
                    @csrf
                    <hr />
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Tên của bạn" >
                        @if ($errors->has('name'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            placeholder="Email" >
                        @if ($errors->has('email'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('address') ? 'has-error' : '' }}">
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"
                            placeholder="Địa chỉ" >
                        @if ($errors->has('address'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}"
                            placeholder="Số điện thoại" >
                        @if ($errors->has('phone'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Mật khẩu" >
                                @if ($errors->has('password'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Xác nhận" >
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" value="Đăng ký" class="btn btn-primary btn-block btn-lg" ></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
