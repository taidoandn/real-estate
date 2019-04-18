@extends('frontend.master')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Bài viết của tôi </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-responsive">
                      @foreach ($posts as $post)
                      <tr>
                            <td width="100">
                                <img src="{{ asset('uploads/images/'.$post->image) }}"
                                    class="thumb-listing-table" alt="">
                            </td>
                            <td>
                                <h5><a href="{{ $post->url }}"
                                        target="_blank">{{ $post->title }}</a> (<span
                                        class="text-success">{{ ucwords($post->status) }}</span>)</h5>
                                <p class="text-muted">
                                    <i class="fa fa-map-marker"></i> {{ $post->address }}
                                    <a  href="{{ route('getSearch',['city_id'=>$post->district->city->id,'district_id'=>$post->district->id]) }}">
                                        {{ $post->district->name }}</a>,
                                    <a href="{{ route('getSearch', ['city_id'=>$post->district->city->id]) }}"> {{ $post->district->city->name }}</a>
                                    <br /> <i class="fa fa-clock-o"></i> {{ $post->created_date }}
                                </p>
                            </td>

                            <td width="100px">
                                <a href="{{ route('posts.edit',$post->id) }}"
                                    class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                <a href="javascript:;" class="btn btn-danger"
                                    onclick="event.preventDefault();
                                    if(confirm('Bạn có chắc muốn xóa?'))
                                        document.getElementById('delete-post-{{ $post->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-post-{{ $post->id }}" action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                      @endforeach
                    </table>

                    <div class="text-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- /#page-wrapper -->
    </div> <!-- /#wrapper -->
</div> <!-- /#container -->
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });

</script>
@endpush
