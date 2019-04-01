@extends('frontend.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endsection
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Chỉnh sửa bài viết </h1>

                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-10 col-xs-12">
                    <form method="POST" action="{{ route('posts.update',$post->id) }}" accept-charset="UTF-8"
                        id="adsPostForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <legend>Thông tin bài viết</legend>
                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-3 control-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ad_title"
                                    value="{{ old('title',$post->title) }}" name="title" placeholder="Title">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="description" class="col-sm-3 control-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control ckeditor" rows="8">{!! old('description',$post->description_html) !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group required ">
                            <label class="col-sm-3 control-label">Loại bất động sản</label>
                            <div class="col-sm-9">
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach ($property_types as $type)
                                    <option {{ old('type_id',$post->type_id == $type->id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="purpose" class="col-sm-3 control-label">Mục đích</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="purpose" id="purpose">
                                    <option value="">Chọn mục đích</option>
                                    <option {{ old('purpose',$post->purpose) == 'sale' ? 'selected' : '' }} value="sale">Bán</option>
                                    <option {{ old('purpose',$post->purpose) == 'rent' ? 'selected' : '' }} value="rent">Thuê</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="unit" class="col-sm-3 control-label">Đơn vị</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit" id="unit">
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="area" class="col-sm-3 control-label">Diện tích</label>
                            <div class="col-sm-9">
                                <input type="text" name="area" class="form-control" id="area" value="{{ $post->area }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Giá</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">VND</span>
                                    <input type="text" placeholder="Ex: 10000000" class="form-control" name="price"
                                        id="price" value="{{ old('price',$post->price) }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="negotiable" id="negotiable">
                                        Thỏa thuận </label>
                                </div>
                            </div>
                        </div>


                        <legend>Thông tin chi tiết</legend>

                        <div class="form-group ">
                            <label for="square_unit_space" class="col-sm-3 control-label">Square Unit Space</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="square_unit_space" value=""
                                    name="square_unit_space" placeholder="Square Unit Space">

                                <p class="help-block">Unit should be match with price unit, if any </p>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="floor" class="col-sm-3 control-label">Floor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="floor" value="" name="floor"
                                    placeholder="Ex: 1st or 2nd or 10th">

                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="beds" class="col-sm-3 control-label">Beds</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="beds" value="" name="beds"
                                    placeholder="Beds">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="attached_bath" class="col-sm-3 control-label">Attached bath(s)</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="attached_bath" value=""
                                    name="attached_bath" placeholder="Attached bath(s)">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="common_bath" class="col-sm-3 control-label">Common bath(s)</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="common_bath" value="" name="common_bath"
                                    placeholder="Common bath(s)">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="balcony" class="col-sm-3 control-label">Balcony(ies)</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="balcony" value="" name="balcony"
                                    placeholder="Balcony(ies)">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="additional_details" class="col-sm-3 control-label">Additional details</label>
                            <div class="col-sm-9">
                                <label><input type="checkbox" value="1" name="dining_space" /> Dining space </label>
                                <label><input type="checkbox" value="1" name="living_room" /> Living room </label>
                            </div>
                        </div>

                        <legend>Tiện ích</legend>

                        <div class="form-group">
                            <div class="col-sm-12 m-b-10">
                                <h5>Ngoại thất</h5>
                                @foreach ($conveniences as $convenience)
                                @if ($convenience->type == "exterior")
                                <div class="checkbox col-sm-3">
                                    <label>
                                        <input type="checkbox" value="{{ old('conveniences',$convenience->id) }}"
                                            name="conveniences[]"> {{ $convenience->name }}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-sm-12">
                                <h5>Nội thất</h5>
                                @foreach ($conveniences as $convenience)
                                @if ($convenience->type == "interior")
                                <div class="checkbox col-sm-3">
                                    <label>
                                        <input type="checkbox" value="{{ old('conveniences',$convenience->id) }}"
                                            name="conveniences[]"> {{ $convenience->name }}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <legend>Khoảng cách</legend>
                        @foreach ($distances as $distance)
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ ucwords($distance->name) }}</label>
                            <div class="col-lg-7">
                                <input type="number" placeholder="{{ ucwords($distance->name) }}" class="form-control"
                                    @foreach ($post->distances as $post_distance)
                                        @if ($distance->id == $post_distance->id)
                                            value="{{ old('distances.'.$distance->id,$post_distance->pivot->meters) }}"
                                        @endif
                                    @endforeach name="distances[{{ $distance->id }}]">
                            </div>
                            <div class="col-lg-2">
                                meters
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <legend>Hình ảnh</legend>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <div id="uploaded-ads-image-wrap">

                                </div>
                                <div class="file-upload-wrap">
                                    <label>
                                        <input type="file" name="images" id="images" style="display: none;" />
                                        <i class="fa fa-cloud-upload"></i>
                                        <p>Upload image...</p>
                                        <div class="progress" style="display: none;"></div>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <legend>Thông tin địa điểm</legend>
                        <div class="form-group">
                            <label for="category_name" class="col-sm-3 control-label">Thành phố</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" id="city_id" name="city_id">
                                    <option value="">Chọn thành phố</option>
                                    @foreach ($cities as $city)
                                        <option {{ $city->id == $post->district->city->id ? 'selected' : ''}} value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group  ">
                            <label for="category_name" class="col-sm-3 control-label">Quận/huyện</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" id="district_id" name="district_id">
                                        <option value="">Chọn Quận/huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" value="{{ old('address',$post->address) }}" name="address"
                                    placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="latitude" class="col-sm-3 control-label">Vĩ độ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly id="latitude" value="{{ old('latitude',$post->latitude) }}" name="latitude"
                                    placeholder="Latitude">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="longitude" class="col-sm-3 control-label">Kinh độ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly id="longitude" value="{{ old('longitude',$post->longitude) }}" name="longitude" placeholder="Longitude">
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p><i class="fa fa-info-circle"></i> Click on the below map to get your location and
                                save </p>
                        </div>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="map" style="width: 100%; height: 400px; margin: 20px 0;"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-9">
                                <button type="submit" class="btn btn-primary">Update ad</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- /#page-wrapper -->

    </div> <!-- /#wrapper -->
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('layout/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('layout/editor/ckfinder/ckfinder.js')}}"></script>
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });

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
            var old_purpose = "{{ old('purpose',$post->purpose) }}";
            var old_unit = "{{ old('unit',$post->unit) }}";
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
    });
</script>
<script>
$(document).ready(function () {
        $('select[name="city_id"]').change(function () {
            $('select[name="district_id"]').select2('val',"");
            var city_id = $(this).val();
            getDistrict(city_id);
        });
        if($('select[name="city_id"]').val()) {
            var city_id = $('select[name="city_id"]').val();
            var district_id = '{{ old("district_id",$post->district_id) ?? null }}'
            getDistrict(city_id,district_id);
        }
    });

    function getDistrict(city_id,district_id = null){
        $.ajax({
            type : 'get',
            url : '{{ route('ajax.districts') }}',
            data : { city_id : city_id },
            success : function (data) {
                var options = '';
                options += '<option value="" selected> Chọn Quận/huyện </option>';
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        options += "<option value='" + value.id + "'>" + value.name + "</option>";
                    });
                    $('select[name="district_id"]').html(options);
                    $('select[name="district_id"]').select2();
                    $('select[name="district_id"]').val(district_id).change();
                }else {
                    $('select[name="district_id"]').html(options);
                    $('select[name="district_id"]').select2();
                }
            }
        });
    }
</script>
@endpush
