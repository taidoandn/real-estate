<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12 ">
            <div class="topContactInfo">
                <ul class="nav nav-pills">
                    <li>
                        <a href="callto://+(123) 456-7890">
                            <i class="fa fa-phone"></i>
                            +(123) 456-7890
                        </a>
                    </li>

                    <li>
                        <a href="/cdn-cgi/l/email-protection#0c65626a634c6f797f786361697e226f63612c">
                            <i class="fa fa-envelope"></i>
                            <span class="__cf_email__" data-cfemail="771e1911183714020403181a12055914181a">Email</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-md-8 col-sm-12">
            <div class="topContactInfo">
                @if (Auth::check())
                <ul class="nav nav-pills navbar-right">
                    <li>
                        <a href="{{ route('profile.index') }}">
                            <i class="fa fa-user"></i>
                            Hi, {{ Auth::user()->name }} </a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}">
                            <i class="fa fa-sign-out"></i>
                            Log-Out </a>
                    </li>
                </ul>
                @else
                <ul class="nav nav-pills navbar-right">
                    <li>
                        <a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"> <i class="fa fa-save"></i>
                            Register</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
