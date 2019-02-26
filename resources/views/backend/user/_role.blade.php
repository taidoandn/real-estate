@forelse ($user->roles as $role)
    <span class="label bg-yellow">{{ $role->name }}</span>
@empty
    <span class="label bg-aqua">None</span>
@endforelse
