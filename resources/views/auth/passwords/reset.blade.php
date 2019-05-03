@extends('frontend.master')
@section('title',"Forget password")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="login">
                <h3 class="authTitle">Khôi phục mật khẩu
                </h3>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}"
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

                            <div class="input-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận">
                            </div>
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Khôi phục mật khẩu
                                    </button>
                                </div>
                            </div>
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
<script>
    toastr.success("{{ session('status') }}")
</script>
@endif
@endpush
