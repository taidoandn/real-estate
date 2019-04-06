<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            Home
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('posts.create') }}"> <i class="fa fa-tag"></i>
                    Create a post</a>
            </li>
            <li>
                <a href="https://demo.themeqx.com/themeqxestate/blog"> <i class="fa fa-rss"></i> Blog</a>
            </li>
            <li>
                <a href="https://demo.themeqx.com/themeqxestate/contact-us"> <i class="fa fa-mail-forward"></i>Contact
                    Us</a>
            </li>

        </ul>
    </div>
    <!--/.navbar-collapse -->
</div>
