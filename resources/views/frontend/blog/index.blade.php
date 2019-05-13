@extends('frontend.master')
@section('title','Blog')
@section('content')
<div class="jumbotron jumbotron-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Blog</h2>
            </div>
            <div class="col-md-6">
                <div class="blog-breadcrumb">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <span>Blog</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="blog-listing" class="col-md-10 col-sm-12 col-md-offset-1">
           @foreach ($blogs as $blog)
           <section class="post">
                <div class="row">
                    <div>
                        <div class="col-md-4">
                            <div class="image" style="height: 196px;">
                                <a href="{{ $blog->url }}">
                                    <img class="img-responsive" alt="Vacation gift with toronto visit"
                                        src="{{ $blog->image_url ?? asset('layout/placeholder.png') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2><a href="{{ $blog->url }}"
                                    class="blog-title">{{ $blog->title }}</a></h2>
                            <div class="clearfix">
                                <p class="author-category">Viết bởi <strong>{{ $blog->author }}</strong></p>
                                <p class="date-comments">
                                    <i class="fa fa-calendar"></i> {{ $blog->created_at->toDateTimeString() }}
                                </p>
                            </div>
                            <p class="intro" itemprop="description">
                               {!! str_limit($blog->content_html, 200) !!}
                            </p>
                            <p class="read-more">
                                <a href="{{ $blog->url }}"
                                class="btn btn-template-main">Tiếp tục đọc</a>
                            </p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <div class="text-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
