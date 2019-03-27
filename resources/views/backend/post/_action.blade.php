<a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>
    Edit</a>
<a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>
    Delete</a>
