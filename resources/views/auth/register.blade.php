@extends('frontend.master')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required>

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
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
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
                <h3 class="authTitle">Sign up or <a href="{{ route('login') }}">Login</a> </h3>
                <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" role="form">
                    @csrf
                    <hr />
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="Your Name"
                            tabindex="1">
                    </div>

                    <div class="form-group  ">
                        <input type="email" name="email" id="email" class="form-control" value=""
                            placeholder="Email Address" tabindex="4">
                    </div>

                    <div class="form-group ">
                        <input type="text" name="phone" id="phone" class="form-control" value=""
                            placeholder="Phone Number" tabindex="3">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group ">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" tabindex="5">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group ">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm Password" tabindex="6">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-12"><input type="submit" value="Register"
                                class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
