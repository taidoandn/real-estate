@extends('frontend.master')
@section('title','Contact')
@section('content')
<div class="jumbotron jumbotron-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2>Liên hệ</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Công ty chúng tôi</legend>
                <address>
                    <strong>ThemeqxEstate</strong>
                    <br />
                    <i class="fa fa-map-marker"></i>
                    2/21 Barden Loop <br /> Cupertino, CA 774636
                    <br><i class="fa fa-phone"></i>
                    <abbr title="Phone">(123) 456-7890</abbr>
                </address>
                <address>
                    <strong>Email</strong>
                    <br> <i class="fa fa-envelope-o"></i>
                    <a href="/cdn-cgi/l/email-protection#472e2921280724323433282a22356924282a67"> <span
                            class="__cf_email__"
                            data-cfemail="c8a1a6aea788abbdbbbca7a5adbae6aba7a5">admin@demo.com</span> </a>
                </address>
            </form>

            <div class="well well-sm">
                <form method="POST" action="{{ route('contacts.post') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name">Tên :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                    value="{{ old('name',Auth::user()->name ?? null) }}" required="required" />
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('name') }}
                                    </strong>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email">Email :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Enter email address" name="email" value="{{ old('email',Auth::user()->email ?? null) }}" required="required" />
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('email') }}
                                        </strong>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                                <label for="name">Tin nhắn :</label>
                                <textarea name="message" id="message" class="form-control" required="required"
                                    placeholder="Message">{{ old('message') }}</textarea>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('message') }}
                                </strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs"> Send
                                Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d958.4543019831076!2d108.22225422406699!3d16.074972595145592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218307c52d95f%3A0x3600ad8919e0f83f!2zMyBRdWFuZyBUcnVuZywgVGjhuqFjaCBUaGFuZywgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1556685187314!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
