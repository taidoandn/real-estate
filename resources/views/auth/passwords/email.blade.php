@extends('frontend.master')
@section('title',"Forget password")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">{{ __('Reset Password') }}
                </h3>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="email address" autofocus>
                            </div>

                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                             {{-- <button class="btn btn-primary btn-block m-t-10" type="submit">{{ __('Send Password Reset Link') }}</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@if (session('status'))
    <script> toastr.success("{{ session('status') }}")</script>
@endif
@endpush
