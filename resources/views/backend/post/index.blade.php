@extends('backend.master')
@section('title','Bài viết')
@section('content')

<section class="content-header">
    <h1>
        List Post
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">
                        Danh sách bài viết
                    </p>
                </div>
                <div class="panel-body">
                    <div class="form-group clearfix">
                        <a href="{{ route('admin.posts.create') }}" class="btn bg-blue pull-right"><i class="fa fa-plus"></i> Thêm mới</a>
                        <button type="button" class="btn bg-blue" data-toggle="collapse" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>

                        <button type="button" onclick="refresh()" class="btn bg-blue"><i class="fa fa-refresh"></i> Refresh</button>

                        <div id="filter" class="collapse m-t-10">
                            <form id="filter-form" class="col-md-4" action="">
                                <div class="form-group">
                                    <label for="keyword">Keyword:</label>
                                    <input type="text" name="keyword" class="form-control" id="keyword">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="pending">Pending</option>
                                        <option value="published">Published</option>
                                        <option value="expired">Expired</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                    <table id="posts-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Người đăng</th>
                                <th>Trạng thái</th>
                                <th style="width: 15%">Action</th>
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
    var posts_table = $('#posts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('admin.api.posts') !!}',
            data: function (d) {
                d.keyword = $('input[name=keyword]').val();
                d.status  = $('select[name=status]').val();
            }
        },
        columns: [
            {data: 'id',name: 'id'},
            {data: 'title',name: 'title'},
            {data: 'image',name: 'image',orderable: false, searchable: false},
            {data: 'price',name: 'price'},
            {data: 'owner', name: 'owner'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        posts_table.draw();
        $("#filter").collapse('hide');
    });
    function refresh() {
        window.location.reload();
    }

    function deletePost(id) {
        var csrf_token = $("meta[name='csrf-token']").attr('content');
        if (confirm('Bạn có chắc là muốn xóa?')) {
            $.ajax({
                type: "post",
                url: base_url + "/admin/posts/"+ id ,
                data: {
                    '_method' : "DELETE",
                    '_token' : csrf_token
                },
                success: function (data) {
                    toastr.success(data);
                    posts_table.draw(false);
                },
                error: function (xhr) {
                    var res = xhr.responseJSON;
                    if (res.message) {
                        alert(res.message);
                    }else{
                        alert("Error!!")
                    }
                }
            });
        }else{
            return false;
        }
    }
</script>
@endpush
