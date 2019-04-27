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
                            <a href="https://demo.themeqx.com/themeqxestate">Home</a>
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
                    <div itemtype="http://schema.org/NewsArticle">
                        <div class="col-md-4">
                            <div class="image" style="height: 196px;">
                                <a href="{{ route('blogs.show',$blog->slug) }}">
                                    <img class="img-responsive" alt="Vacation gift with toronto visit"
                                        src="{{ asset(@$blog->image ? 'uploads/images/'.$blog->image : 'layout/backend/img/placeholder.png') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2><a href="{{ route('blogs.show', $blog->slug) }}"
                                    class="blog-title">{{ $blog->title }}</a></h2>
                            <div class="clearfix">
                                <p class="author-category">By <strong>{{ $blog->author }}</strong></p>
                                <p class="date-comments">
                                    <i class="fa fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <p class="intro" itemprop="description">
                               {!! str_limit($blog->content, 200) !!}
                            </p>
                            <p class="read-more">
                                <a href="{{ route('blogs.show',$blog->slug) }}"
                                class="btn btn-template-main">Continue reading</a>
                            </p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </section>
           @endforeach
        </div>
    </div>
</div>
@endsection
