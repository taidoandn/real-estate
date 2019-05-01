@extends('backend.master')
@section('title','Edit Blog')
@section('content')
<section class="content-header">
    <h1>
        Edit Blog
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog</li>
    </ol>
</section>
<section class="content">
    <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h2 style="text-align: center;">Blog Form</h2>
                </div>
                <form action="{{ route('admin.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <label>Title blog: </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter Title of blog ..." value="{{ old('title',$blog->title) }}">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('title') }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <label>Content blog: </label>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control ckeditor" row="10" name="content"
                                        placeholder="Enter Content of blog ...">{{ old('content',$blog->content) }}</textarea>
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('content') }}
                                    </strong>
                                </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <label>Author: </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="author"
                                        placeholder="Enter author of blog ..." value="{{ old('author',$blog->author) }}">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('author') }}
                                    </strong>
                                </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="form-group {{ $errors->has('fImage') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <label>Image :</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="file" name="fImage" id="img" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" src="{{ $blog->image_url ?? asset('layout/backend/img/new_seo-10-512.png') }}">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('fImage') }}
                                    </strong>
                                </div>
                            </div>
                        </div><br />
                        <div class="box-footer" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
@endsection
@push('script')
<script src="{{ asset('layout/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/custom.js')}}"></script>
@endpush
