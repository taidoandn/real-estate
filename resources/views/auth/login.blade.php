@extends('frontend.master')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">Login or <a href="{{ route('register') }}">Sign up</a>
                </h3>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <form method="POST" action="https://demo.themeqx.com/themeqxestate/login" accept-charset="UTF-8"
                            class="loginForm" autocomplete="off">
                            @csrf

                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" value="" placeholder="email address">
                            </div>
                            <span class="help-block"></span>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <span class="help-block"></span>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                        </form>
                    </div>
                </div>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-6">
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me">Remember Me
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
