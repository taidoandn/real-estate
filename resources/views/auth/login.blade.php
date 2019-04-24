@extends('frontend.master')
@section('title',"Login")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">Login or <a href="{{ route('register') }}">Sign up</a>
                </h3>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" class="loginForm"
                            autocomplete="off">
                            @csrf
                            <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="email address" autofocus>
                            </div>
                            @if ($errors->has('email'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <span class="help-block"></span>
                            <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                        </form>
                    </div>
                </div>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-6">
                            <label class="checkbox">
                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }} value="remember">Remember
                                Me
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
