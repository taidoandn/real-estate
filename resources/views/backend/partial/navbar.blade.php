<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{  asset('layout/backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
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
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/roles") ? "active" : "" }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-user-times"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/users*") ? "active" : "" }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user-times"></i>
                    <span>Admin</span>
                </a>
            </li>
            <li class="{{ Request::is("admin/accounts*") ? "active" : "" }}">
                <a href="{{ route('admin.accounts.index') }}">
                    <i class="fa fa-user-circle-o"></i>
                    <span>Account</span>
                </a>
            </li>
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
