<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-role" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Permission:</label>
                        <div class="col-md-6">
                            <label class="col-md-12 m-t-05">Post:</label>
                            @foreach ($permissions as $permission)
                            @if ($permission->type=="post")
                            <div class="checkbox col-md-6 ">
                                <label for="{{ $permission->name }}"> <input type="checkbox" id="{{ $permission->name }}"
                                        value="{{$permission->id}}" name="permission[]">{{ $permission->name }}</label>
                            </div>
                            @endif
                            @endforeach

                            <label class="col-md-12 m-t-05">User:</label>
                            @foreach ($permissions as $permission)
                            @if ($permission->type=="user")
                            <div class="checkbox col-md-6">
                                <label for="{{ $permission->name }}"> <input type="checkbox" id="{{ $permission->name }}"
                                        value="{{$permission->id}}" name="permission[]">{{ $permission->name }}</label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
