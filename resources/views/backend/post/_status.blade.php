@switch($post->status)
    @case("pending")
        <span class="label label-warning">{{ ucfirst($post->status) }}</span>
        @break
    @case("published")
        <span class="label label-success">{{ ucfirst($post->status) }}</span>
        @break
    @default
        <span class="label label-danger">{{ ucfirst($post->status) }}</span>
@endswitch
