<a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<a onclick="deleteBlogData({{ $blog->id }})" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>

