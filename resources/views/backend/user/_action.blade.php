<a onclick="editForm({{ $user->id }})" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
@if (Auth::user()->id != $user->id)
<a onclick="deleteData({{ $user->id }})" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>
@endif

