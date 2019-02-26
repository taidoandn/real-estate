@extends('backend.master')
@section('title','Tài khoản')
@section('content')

<section class="content-header">
    <h1>
        List Account
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account</li>
    </ol>
</section>
@include('backend.user._modal')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">
                        DataTables Users
                    </p>
                </div>
                <div class="panel-body">
                    <div class="form-group clearfix">
                        <button onclick="addForm()" class="btn bg-blue pull-right"><i class="fa fa-plus"></i> Thêm mới</button>
                        <button onclick="refresh()" class="btn bg-blue "><i class="fa fa-refresh"></i> Refresh</button>
                    </div>

                    <table id="users-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="width: 18%">Role</th>
                                <th style="width: 18%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('layout/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@push('script')
<script src="{{ asset('layout/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('layout/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    var users_table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.api.users') !!}',
        columns: [
            {data: 'id',name: 'id'},
            {data: 'name',name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'role', name: 'role', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
<script src="{{  asset('layout/backend/js/myscript/users.js') }}"></script>
@endpush
