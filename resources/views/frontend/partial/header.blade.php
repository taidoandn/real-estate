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
                            <span class="__cf_email__" data-cfemail="771e1911183714020403181a12055914181a">[email&#160;protected]</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-md-8 col-sm-12">
            @if (Auth::check())
            <div class="topContactInfo">
                <ul class="nav nav-pills navbar-right">
                    <li>
                        <a href="https://demo.themeqx.com/themeqxestate/dashboard/u/posts/profile">
                            <i class="fa fa-user"></i>
                            Hi, {{ Auth::user()->name }} </a>
                    </li>
                    <li>
                        <a href="https://demo.themeqx.com/themeqxestate/dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard </a>
                    </li>
                    <li>
                        <a href="https://demo.themeqx.com/themeqxestate/dashboard/logout">
                            <i class="fa fa-sign-out"></i>
                            Log-Out </a>
                    </li>
                </ul>
                @else
                <form method="POST" action="https://demo.themeqx.com/themeqxestate/login" accept-charset="UTF-8" class="navbar-form navbar-right"
                    role="form"><input name="_token" type="hidden" value="9BfYYnvVuK3kDJyjaD8LxQBGWSg29MKC36m1ICUI">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign In</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
