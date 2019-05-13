@extends('backend.master')
@section('title','Property Type')
@section('content')

<section class="content-header">
    <h1>
        List Property Type
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Property Type</li>
    </ol>
</section>
@include('backend.property-type._modal')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">
                        DataTables Property Type
                        <a onclick="addPropertyForm()" class="btn btn-primary pull-right" style="margin-top: -5px;color:#fff">Thêm mới</a>
                    </p>
                </div>
                <div class="panel-body">
                    <table id="property-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
<link rel="stylesheet" href="{{  asset('layout/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@push('script')
<script src="{{  asset('layout/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{  asset('layout/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    var property_table = $('#property-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('admin.api.property-types') !!}",
        columns: [
            {data: 'id',name: 'id'},
            {data: 'name',name: 'name'},
            {data: 'created_at',name: 'created_at'},
            {data: 'updated_at',name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
<script src="{{ asset('layout/backend/js/myscript/property-type.js') }}"></script>
@endpush
