@extends('backend.master')
@section('title', 'Dashboad')
@section('content')
<!-- Thong ke - Bao cao -->
<section class="content-header">
    <h1 style="text-align: center;">
        Statistical - Report
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Statistical - Report</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">total posts</span>
                    <span class="info-box-number">{{ $total_posts }} <small>{{ str_plural('post',$total_posts)}}</small></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-file-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">pending posts</span>
                    <span class="info-box-number">{{ count($pending_posts) }}</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">published posts</span>
                    <span class="info-box-number">{{ $published_posts_count }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">expired posts</span>
                    <span class="info-box-number">{{ $expired_posts_count }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">account</span>
                    <span class="info-box-number">{{ $total_accounts }}<small> {{ str_plural('account',$total_accounts) }}</small></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">new accounts</span>
                    <span class="info-box-number">{{ $new_accounts }}</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">total blogs</span>
                    <span class="info-box-number">{{ $total_blogs }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">total reports</span>
                    <span class="info-box-number">{{ count($reports) }}</span>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">10 Latest pending posts</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Purpose</th>
                                    <th>Date Diff</th>
                                    <th>Total price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($pending_posts->take(10) as $post)
                                <tr>
                                    <td><a href="pages/examples/invoice.html">{{ $post->id }}</a></td>
                                    <td>{{ str_limit($post->title, 30) }}</td>
                                    <td><span class="label label-{{ $post->purpose == 'sale' ? 'success' : 'warning' }}">{{ ucwords($post->purpose) }}</span></td>
                                    <td>{{ dateDiff($post->start_date,$post->end_date) }}</td>
                                    <td>{{ number_format($post->total_price,0,',','.') }}</td>
                                    <td>
                                       <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit',$post->id) }}">Detail</a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-submit btn-flat pull-right">View More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">5 Latest report</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    @foreach ($reports->take(5) as $report)
                    <li class="item">
                        <div class="product-img">
                          <img src="{{ $report->post->image_url }}" alt="{{ $report->post->title }}">
                        </div>
                        <div class="product-info">
                          <a href="{{ $report->post->url }}" class="product-title">{{ $report->post->title }}
                            <span class="label label-warning pull-right">{{ ucwords($report->reason) }}</span></a>
                            <span class="product-description">
                                {{ $report->message }}
                            </span>
                            <span><strong>Created At :</strong>  {{ $report->created_at->toDateTimeString() }}</span> <br>
                            <span><strong>Email :</strong>  {{ $report->email }}</span>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ route('admin.reports.index') }}" class="uppercase">View All Reports</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
</section>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('layout/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
@endpush
