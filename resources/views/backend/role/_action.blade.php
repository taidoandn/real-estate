{{-- <a  class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> --}}
<a onclick="editRoleForm({{ $role->id }})" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<a onclick="deleteRoleData({{ $role->id }})" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>
