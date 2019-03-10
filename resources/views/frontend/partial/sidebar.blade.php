<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href=""><i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="#" ><i class="fa fa-bullhorn"></i> My ads<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/u/posts/my-lists" >My ads</a>
                    </li>
                    <li>
                        <a href="/u/posts/create">Post an ad</a>
                    </li>
                    <li>
                        <a href="/u/posts/pending-lists">Pending for approval</a>
                    </li>
                    <li>
                        <a href="/u/posts/favorite-lists">Favouriteads</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/categories"><i class="fa fa-list"></i> Amenities</a>
            </li>
            <li>
                <a href="/distances"><i class="fa fa-adjust"></i> Distances</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-rss-square"></i> Blog<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="/posts">Posts</a> </li>
                    <li>
                        <a href="/posts/create">Create New Post</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="/pages"><i class="fa fa-file-word-o"></i> Pages</a>
            </li>
            <li>
                <a href="/ad-reports"><i class="fa fa-exclamation"></i> Ad reports</a> </li>
            <li> <a href="/users"><i class="fa fa-users"></i>
                    Agents</a> </li>

            <li>
                <a href="#"><i class="fa fa-map-marker"></i> Locations<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="/location/country">Countries</a>
                    </li>
                    <li> <a href="/location/states">States</a>
                    </li>
                    <li> <a href="/location/cities">Cities</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li> <a href="/contact-messages"><i class="fa fa-envelope-o"></i>
                    Contact Messages</a> </li>

            <li> <a href="/administrators"><i class="fa fa-users"></i>
                    Administrators</a> </li>
            <li> <a href="/payments"><i class="fa fa-money"></i>
                    Payments</a> </li>
            <li> <a href="/u/posts/profile"><i class="fa fa-user"></i>
                    Profile</a> </li>
            <li> <a href="/u/posts/account/change-password"><i class="fa fa-lock"></i>
                    Change Password</a> </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
@push('js')
<script src="{{ asset('layout/frontend/plugins/metisMenu/dist/metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });
</script>
@endpush
