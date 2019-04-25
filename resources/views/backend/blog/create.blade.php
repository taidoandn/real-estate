@extends('backend.master')
@section('title','Create Blog')
@section('content')
<section class="content-header">
    <h1>
        Create Blog
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
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title blog: </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="Enter Title of blog ...">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <label>Content blog: </label>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" row="10" placeholder="Enter Content of blog ..."></textarea>
                        </div>
                    </div><br />
                    <div class="box-footer" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
@endsection
