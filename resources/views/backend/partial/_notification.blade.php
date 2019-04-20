<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell-o"></i>
    <span class="label label-warning">{{ $unreadNotifications->count() }}</span>
</a>
<ul class="dropdown-menu">
    <li class="header">You have {{ $unreadNotifications->count() }} unread notifications</li>
    <li>
        <ul class="menu">
            @forelse ($notifications  as $notif)
                @include('backend.partial.notifications.'.snake_case(class_basename($notif->type)))
            @empty
            <li>
                Empty
            </li>
            @endforelse
        </ul>
    </li>
    <li class="footer" onclick="markAsRead('all')"><a href="javascript:void(0)">Mark as read all</a></li>
</ul>
