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
            Trang chủ
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('posts.create') }}"> <i class="fa fa-tag"></i>
                    Thêm bài viết</a>
            </li>
            <li>
                <a href="{{ route('blogs.index') }}"> <i class="fa fa-rss"></i> Blog</a>
            </li>
            <li>
                <a href="{{ route('contacts.get') }}"> <i class="fa fa-mail-forward"></i>Liên hệ
                </a>
            </li>

        </ul>
    </div>
    <!--/.navbar-collapse -->
</div>
