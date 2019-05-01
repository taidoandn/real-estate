<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> Thông tin cá nhân</a>
            </li>
            <li>
                <a href="{{ route('profile.change-pass') }}"><i class="fa fa-lock"></i> Thay đổi mật khẩu</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> Bài viết<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('posts.index') }}">Bài viết của tôi</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}">Thêm bài viết</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.favorite-list') }}">Bài viết yêu thích</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
