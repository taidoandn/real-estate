@extends('frontend.master')
@section('title',$blog->title)
@section('content')
<div class="jumbotron jumbotron-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="blog-post-title"><a
                            href="{{ route('blogs.show', $blog->slug) }}"
                            title="{{ $blog->title }}">{{ $blog->title }}</a> </h2>
                </div>
                <div class="col-md-6">
                    <div class="blog-breadcrumb">
                        <ul class="breadcrumb">
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li> <a href="{{ route('blogs.index') }}">Blog</a> </li>
                            <li> <span>{{ $blog->title }}</span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="blog-single" class="col-md-10 col-sm-12 col-md-offset-1">
                <section class="post post-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="clearfix">
                                <p class="author-category">By <strong>{{ $blog->author }}</strong></p>
                                <p class="date-comments">
                                    <i class="fa fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <hr />
                            @if ($blog->image)
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" alt="There are many variations of passages of Lorem " title="{{ $blog->title }}" src="{{ asset('uploads/images/'.$blog->image ) }}" style="width: 100%">
                                </div>
                            </div>
                            @endif
                            <div class="post-content">
                                <div>
                                    {!! $blog->content_html !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="comments-title">
                    <h2> <i class="fa fa-comment"></i> Comments</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
