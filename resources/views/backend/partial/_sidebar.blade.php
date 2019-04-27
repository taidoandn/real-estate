<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{  asset('layout/backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is("admin/dashboard") ? "active" : "" }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ Request::is("admin/cities*") || Request::is("admin/districts*") ? "active" : "" }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Location</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is("admin/cities*") ? "active" : "" }}"><a href="{{ route('admin.cities.index') }}"><i class="fa fa-circle-o"></i> City</a></li>
                    <li class="{{ Request::is("admin/districts*") ? "active" : "" }}"><a href="{{ route('admin.districts.index') }}"><i class="fa fa-circle-o"></i> District</a></li>
                </ul>
            </li>
            <li class="{{ Request::is("admin/property-types*") ? "active" : "" }}">
                <a href="{{ route('admin.property-types.index') }}">
                    <i class="fa fa-building"></i>
                    <span>Property Type</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/blogs*") ? "active" : "" }}">
                <a href="{{ route('admin.blogs.index') }}">
                    <i class="fa fa-building"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/post-types*") ? "active" : "" }}">
                <a href="{{ route('admin.post-types.index') }}">
                    <i class="fa fa-building"></i>
                    <span>Post Type</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/conveniences*") ? "active" : "" }}">
                <a href="{{ route('admin.conveniences.index') }}">
                    <i class="fa fa-list"></i>
                    <span>Convenience</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/distances*") ? "active" : "" }}">
                <a href="{{ route('admin.distances.index') }}">
                    <i class="fa fa-road"></i>
                    <span>Distance</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/accounts*") ? "active" : "" }}">
                <a href="{{ route('admin.accounts.index') }}">
                    <i class="fa fa-user-circle-o"></i>
                    <span>Account</span>
                </a>
            </li>
            @can('isSuperAdmin', Model::class)
                <li class="{{ Request::is("admin/users*") ? "active" : "" }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-user"></i>
                        <span>User Admin</span>
                    </a>
                </li>
                <li class="{{ Request::is("admin/roles") ? "active" : "" }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="fa fa-user-times"></i>
                        <span>Role</span>
                    </a>
                </li>
            @endcan
            <li class="treeview {{ Request::is("admin/posts*") ? "active" : "" }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Bài viết</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is("admin/posts") ? "active" : "" }}"><a href="{{ route('admin.posts.index') }}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
                    <li class="{{ Request::is("admin/posts/create") ? "active" : "" }}"><a href="{{ route('admin.posts.create') }}"><i class="fa fa-circle-o"></i> Thêm bài viết</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
