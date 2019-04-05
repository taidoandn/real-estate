<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="{{ route('profile.change-pass') }}"><i class="fa fa-lock"></i> Change password</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> My Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('posts.index') }}">My posts</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}">Create a post</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.favorite-list') }}">Favourite posts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-rss-square"></i> Blog<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">Posts</a> </li>
                    <li>
                        <a href="#">Post a blog</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
@section('js')
<script src="{{ asset('layout/frontend/plugins/metisMenu/dist/metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });

</script>
@endsection
