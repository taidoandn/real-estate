@if (snake_case(class_basename($notif->type)) == 'new_post_notification')
    <li onclick="markAsRead('{{ $notif->id }}')">
        <a href="{{ route('admin.posts.edit', $notif->data['id']) }}" class="{{ $notif->unread() ? 'unread' : '' }}">
            <i class="fa fa-users text-aqua"></i>
            <strong>{{ $notif->data['user']['name'] }}</strong> vừa đăng bài viết
            <p><i class="fa fa-clock-o"></i> {{ $notif->created_at->diffForHumans() }}</p>
        </a>
    </li>
@endif
