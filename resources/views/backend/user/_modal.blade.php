<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-user" method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('POST') }}
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
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Phone</label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-6">
                            <textarea name="address" class="form-control" id="address" rows="5"></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Roles</label>
                        <div class="col-md-6 flat-red" style="margin-top: 7px;">
                            @foreach ($roles as $role)
                            <input type="checkbox" id="{{ $role->name }}" value="{{$role->id}}" name="role[]">
                            <label for="{{ $role->name }}">{{ $role->name }}</label>
                            @endforeach
                        </div>

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
