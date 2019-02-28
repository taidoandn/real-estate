@extends('backend.master')
@section('title','Cập nhật bài viết')
@section('content')
<section class="content-header">
    <h1>
        Thêm bài viết
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post</li>
    </ol>
</section>
<section class="content">
    <div class="row">
    <form action="{{ route('admin.post.update',['id'=> $post->id]) }}" data-id="{{ $post->id }}" id="form-data" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12">
                            <legend>Thông tin</legend>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                <label for="title" class="col-md-2 control-label">Tiêu đề</label>
                                <div class="col-md-8">
                                    <input type="text" id="title" class="form-control" value="{{ $post->title ?? '' }}" name="title"
                                        placeholder="Nhập tiêu đề">
                                </div>
                                <span class="help-block" role="alert">
                                    {{ $errors->first('title') }}
                                </span>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-2 control-label">Thông tin mô tả</label>
                                <div class="col-md-8">
                                    <textarea class="ckeditor form-control" id="editor" name="description">
										{{ $post->description }}
                                    </textarea>
                                </div>
                                <span class="help-block" role="alert">
                                    {{ $errors->first('description') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
                                <label for="type_id" class="col-md-4 control-label">Loại bất động sản</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" id="type_id" name="type_id">
                                        @foreach ($property_types as $type)
                                        <option {{ $post->type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block" role="alert">
                                        {{ $errors->first('type_id') }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label">Hình thức</label>
                                <div class="radio col-md-8">
                                    <select name="purpose" id="purpose" class="form-control">
                                        <option value="">Chọn hình thức</option>
                                        <option {{ $post->purpose == 'sale'? 'selected' : '' }} value="sale">Bán</option>
                                        <option {{ $post->purpose == 'rent' ? 'selected' : '' }} value="rent">Cho thuê</option>
                                    </select>
                                    <span class="help-block" role="alert">
                                        {{ $errors->first('purpose') }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label">Giá (VNĐ)</label>
                                <div class="col-md-8">
                                    <input type="text" name="price" value="{{ $post->price ?: ''}}" class="form-control">
                                    <span class="help-block" role="alert">
                                        {{ $errors->first('price') }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    Giá tính theo</label>
                                <div class="col-md-8">
                                    <select name="unit" id="unit" class="form-control">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
                                <label for="area" class="col-md-4 control-label">Diện tích (m<sup>2</sup>)</label>
                                <div class="col-md-8">
                                    <input type="text" name="area" value="{{ $post->area ?: ''}}" class="form-control">
                                    <span class="help-block" role="alert">
                                        {{ $errors->first('area') }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="area" class="col-md-4 control-label">Trạng thái</label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control">
                                        <option {{ $post->status == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                        <option {{ $post->status == 'published' ? 'selected' : ''}} value="published">Published</option>
                                        <option {{ $post->status == 'blocked' ? 'selected' : ''}} value="blocked">Blocked</option>
                                    </select>
                                    <span class="help-block" role="alert">
                                        {{ $errors->first('status') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group {{ $errors->has('fImage') ? 'has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Hình ảnh</label>
                                <input type="file" name="fImage" id="img" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar"  src="{{ asset('uploads/images/'.$post->image ?? 'layout/backend/img/new_seo-10-512.png') }}">
                                <span class="help-block" role="alert">
                                    {{ $errors->first('fImage') }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <legend>Image</legend>
                            <div class="progress">
                                <div id="progressBar" class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0%
                                </div>
                            </div>
                            <div id="image_preview">
                                @forelse ($post->images as $image)
                                    <div class="creating-ads-img-wrap" id="image-{{ $image->id }}">
                                    @if (file_exists(public_path('uploads/images/').$image->path))
                                        <img src="{{ asset('uploads/images/'.$image->path) }}" class="img-responsive">
                                        <div class="img-action-wrap">
                                            <a href="javascript:void(0)" id="{{ $image->id }}" class="imgDeleteBtn"><i class="fa fa-trash-o"></i> </a>
                                        </div>
                                    @endif
                                    </div>
                                @empty
                                @endforelse
                                <div class="file-upload-wrap">
                                    <label>
                                    <input type="file" name="fImages" class="m-l-10 hidden" id="fImages" >
                                       <div class="inner-wrap">
                                           <i class="fa fa-cloud-upload"></i>
                                           <p>Upload image...</p>
                                       </div>
                                   </label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6  m-t-10">
                            <legend>Chi tiết</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số tầng</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ $post->detail->floor ?? null }}" placeholder="floor"
                                        name="floor" class="form-control">
                                </div>
                                <span class="help-block">tầng</span>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số phòng ngủ</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ $post->detail->bed_room ?? null }}" placeholder="bed_room"
                                        name="bed_room" class="form-control">
                                </div>
                                <span class="help-block">phòng</span>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số phòng tắm</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ $post->detail->bath ?? null }}" placeholder="bath"
                                        name="bath" class="form-control">
                                </div>
                                <span class="help-block">phòng</span>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ban công</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ $post->detail->balcony ?? null }}" placeholder="balcony"
                                        name="balcony" class="form-control">
                                </div>
                                <span class="help-block">chỗ</span>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Toilet</label>
                                <div class="col-md-6">
                                    <input type="number" value="{{ $post->detail->toilet ?? null }}" min="0" placeholder="toilet"
                                        name="toilet" class="form-control">
                                </div>
                                <span class="help-block">cái</span>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label m-r-10">Bổ sung</label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" {{ $post->detail->living_room  ? 'checked' :null }} name="living_room">Phòng khách</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" {{  $post->detail->dinning_room   ? 'checked' :null }} name="dinning_room">Phòng  ăn</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6  m-t-10">
                            <legend>Khoảng cách</legend>
                            @foreach ($distances as $distance)
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ $distance->name }}</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" placeholder="{{ $distance->name }}" name="distances[{{ $distance->id }}]"
                                        class="form-control"
                                        @foreach ($post->distances as $post_distance)
                                            @if ($post_distance->id == $distance->id)
                                                value="{{ $post_distance->pivot->meters }}"
                                            @endif
                                        @endforeach
                                    />
                                </div>
                                <span class="help-block">meters</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-md-12">
                            <legend>Tiện nghi</legend>
                            <div class="col-md-6">
                                <div class="form-group m-l-25">
                                    <label class="col-md-3 control-label">Nội thất</label>
                                    <div class="col-md-9">
                                        @foreach ($conveniences as $convenience)
                                        @if ($convenience->type == "interior")
                                        <div class="checkbox col-md-6">
                                            <label><input type="checkbox"
                                                @foreach ($post->conveniences as $post_convenience)
                                                    @if ($post_convenience->id == $convenience->id )
                                                    checked
                                                    @endif
                                                @endforeach
                                                name="conveniences[]" value="{{ $convenience->id }}">
                                                {{$convenience->name}}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-l-25">
                                    <label class="col-md-3 control-label">Ngoại thất</label>
                                    <div class="col-md-9">
                                        @foreach ($conveniences as $convenience)
                                        @if ($convenience->type == "exterior")
                                        <div class="checkbox col-md-6">
                                            <label>
                                            <input type="checkbox" name="conveniences[]"
                                            @foreach ($post->conveniences as $post_convenience)
                                                @if ($post_convenience->id == $convenience->id )
                                                    checked
                                                @endif
                                            @endforeach
                                            value="{{ $convenience->id }}">{{$convenience->name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <legend>Thông tin địa điểm</legend>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Thành phố</label>
                                    <div class="col-md-8">
                                        <select name="city" id="city" class="form-control select2">
                                            <option value="">Chọn thành phố</option>
                                            @foreach ($cities as $city)
                                            <option {{ $post->city->id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{$city->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block" role="alert">
                                            {{ $errors->first('city') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Quận Huyện</label>
                                    <div class="col-md-8">
                                        <select name="district_id" id="district_id" class="form-control select2">
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                        <span class="help-block" role="alert">
                                            {{ $errors->first('district_id') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Địa chỉ</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $post->address ?? '' }}" name="address"
                                            id="address">
                                        <span class="help-block" role="alert">
                                            {{ $errors->first('address') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Vĩ độ</label>
                                    <div class="col-md-8">
                                        <input readonly type="text" class="form-control" value="{{ $post->latitude ?? '' }}"
                                            name="latitude" id="latitude">
                                        <span class="help-block" role="alert">
                                            {{ $errors->first('latitude') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Kinh độ</label>
                                    <div class="col-md-8">
                                        <input readonly type="text" class="form-control"
                                        value="{{ $post->longitude ?? '' }}" name="longitude" id="longitude">
                                        <span class="help-block" role="alert">
                                            {{ $errors->first('longitude') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn bg-blue pull-right m-r-10" onclick="getGeolocation()">Get your current location</a>
                                </div>
                            </div>
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div id="map" class="col-md-6">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn bg-blue" value="Cập nhật" name="btn-edit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('layout/backend/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/map.css')}}">
@endpush
@push('script')
<script src="{{ asset('layout/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('layout/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('layout/editor/ckfinder/ckfinder.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/custom.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/post-edit.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQuDQmtiHkS7CcriyEiYXWja3ODrG4vFI&callback=initMap&libraries=places"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor');
    $('.select2').select2();
</script>
<script>
    $(document).ready(function () {
        $("[name='purpose']").on('change', function () {
            if ($(this).val() == 'sale') {
                loadUnit('sale');
            } else if ($(this).val() == 'rent') {
                loadUnit('rent');
            }else{
                $('select[name="unit"]').html('');
            }
        });

        if($('select[name="purpose"]').val()) {
            var purpose = $('select[name="purpose"]').val();
            loadUnit(purpose);
        }

        function loadUnit(purpose) {
            var old_purpose = "{{ $post->purpose }}";
            var old_unit = "{{ $post->unit }}";
            if (purpose == 'sale') {
                var options = "<option value='total_area'>Tổng diện tích</option><option value='m2'>Mét vuông</option>";
                $('select[name="unit"]').html(options);
            }else{
                var options = "<option value='month'>Tháng</option><option value='year'>Năm</option>";
                $('select[name="unit"]').html(options);
            }

            if(old_purpose == purpose && old_unit) {
                $('select[name="unit"]').val(old_unit);
            }
        }

        function loadDistrict(city_id) {
            var old_city_id = '{{ $post->city->id }}';
            var old_district_id = "{{ $post->district_id }}";
            $.ajax({
                type: 'get',
                url: '{{ route('admin.api.districts') }}',
                data: { city_id: city_id },
                success: function(data) {
                    var options ="<option value=''> Chọn quận/huyện</option>";

                    $.each(data, function(key, value) {
                        options += "<option value='" + value.id + "'>" + value.name + "</option>";
                    });

                    $('select[name="district_id"]').html(options);

                    if(old_city_id == city_id && old_district_id) {
                        $('select[name="district_id"]').val(old_district_id);
                    }
                }
            });
        }

        if($('select[name="city"]').val()) {
            var city_id = $('select[name="city"]').val();
            loadDistrict(city_id);
        }

        $('select[name="city"]').change(function() {
            var city_id = $(this).val();
            loadDistrict(city_id);
        });


    });
</script>
@endpush
