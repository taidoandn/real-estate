@extends('frontend.master')
@section('title',"Login")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">Đăng nhập | <a class="text-aqua" href="{{ route('register') }}">Đăng ký</a>
                </h3>
                <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" class="loginForm"
                    autocomplete="off">
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                            @csrf
                            <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Email" autofocus>
                            </div>

                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                            </div>

                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                        </div>
                    </div>
                    <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-6">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="remember">
                            </label>
                            <label class="form-check-label" for="remember">
                                Ghi nhớ
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
