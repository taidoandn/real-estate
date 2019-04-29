@extends('frontend.master')
@section('title','Cập nhật bài viết '.$post->title)
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
                    <form method="POST" action="{{ route('posts.update',$post->id) }}" data-id="{{ $post->id }}"  accept-charset="UTF-8"
                        id="form-data" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <legend>Thông tin bài viết</legend>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                            <label for="title" class="col-sm-3 control-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" id="title" class="form-control" value="{{ old('title',$post->title) }}" name="title"
                                    placeholder="Nhập tiêu đề">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('title') }}
                                    </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                            <label for="description" class="col-sm-3 control-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control ckeditor" rows="8">{{ old('description',$post->description_html) }}</textarea>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('description') }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Loại bất động sản</label>
                            <div class="col-sm-9">
                                <select name="property_type_id" id="property_type_id" class="form-control">
                                    @foreach ($property_types as $property)
                                    <option {{ old('property_type_id',$post->property_id) == $property->id ? 'selected' : '' }} value="{{ $property->id }}">{{ $property->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
                            <label for="purpose" class="col-sm-3 control-label">Mục đích</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="purpose" id="purpose">
                                    <option value="">Chọn mục đích</option>
                                    <option {{ old('purpose',$post->purpose) == 'sale' ? 'selected' : '' }} value="sale">Bán</option>
                                    <option {{ old('purpose',$post->purpose) == 'rent' ? 'selected' : '' }} value="rent">Thuê</option>
                                </select>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('purpose') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('unit') ? 'has-error' : ''}}">
                            <label for="unit" class="col-sm-3 control-label">Đơn vị</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit" id="unit">
                                </select>
                                   <strong class="help-block" role="alert">
                                        {{ $errors->first('unit') }}
                                    </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
                            <label for="area" class="col-sm-3 control-label">Diện tích</label>
                            <div class="col-sm-9">
                                <input type="text" name="area" class="form-control" id="area" value="{{ $post->area }}">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('area') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                            <label for="price" class="col-sm-3 control-label">Giá</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">VND</span>
                                    <input type="text" placeholder="Ex: 10000000" class="form-control" name="price"
                                        id="price" value="{{ old('price',$post->price) }}">

                                </div>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('price') }}
                                </strong>
                            </div>
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {{ $post->negotiable == 1 ? 'checked' : '' }} value="1" name="negotiable" id="negotiable">
                                        Thỏa thuận </label>
                                </div>
                            </div>
                        </div>


                        <legend>Thông tin chi tiết</legend>
                        <div class="form-group {{ $errors->has('floor') ? 'has-error' : ''}}">
                            <label for="floor" class="col-sm-3 control-label">Tầng</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="floor" value="{{ old('floor',$post->detail->floor) }}" name="floor" placeholder="Tầng">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('floor') }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('bed_room') ? 'has-error' : ''}}">
                            <label for="bed_room" class="col-sm-3 control-label">Phòng ngủ</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bed_room" value="{{ old('bed_room',$post->detail->bed_room) }}" name="bed_room"
                                    placeholder="Phòng ngủ">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('bed_room') }}
                                    </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('bath') ? 'has-error' : ''}}">
                            <label for="attached_bath" class="col-sm-3 control-label">Phòng tắm</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bath" value="{{ old('bath',$post->detail->bath) }}"
                                    name="bath" placeholder="Phòng tắm">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('bath') }}
                                    </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('balcony') ? 'has-error' : ''}}">
                            <label for="balcony" class="col-sm-3 control-label">Ban công</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="balcony" value="{{ old('balcony',$post->detail->balcony) }}" name="balcony"
                                    placeholder="Balcony(ies)">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('balcony') }}
                                    </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('toilet') ? 'has-error' : ''}}">
                            <label for="balcony" class="col-sm-3 control-label">Toilet</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="toilet" value="{{ old('toilet',$post->detail->toilet) }}" name="toilet"
                                    placeholder="Toilet">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('toilet') }}
                                    </strong>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="additional_details" class="col-sm-3 control-label">Bổ sung</label>
                            <div class="col-sm-9 m-t-05">
                                <label><input type="checkbox" {{ old('dinning_room',$post->detail->dinning_room) == 1 ? 'checked' : '' }} value="1" name="dinning_room" /> Phòng ăn </label>
                                <label><input type="checkbox" {{ old('living_room',$post->detail->living_room) == 1 ? 'checked' : '' }} value="1" name="living_room" /> Phòng khách </label>
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
                                            <input type="checkbox" value="{{ $convenience->id }}"
                                            @foreach ($post->conveniences as $post_convenience)
                                                @if ($post_convenience->id == $convenience->id )
                                                    checked
                                                @endif
                                            @endforeach
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
                                            <input type="checkbox" value="{{ $convenience->id }}"
                                            @foreach ($post->conveniences as $post_convenience)
                                                @if ($post_convenience->id == $convenience->id )
                                                    checked
                                                @endif
                                            @endforeach
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
                        <div class="form-group m-l-20 {{ $errors->has('fImage') ? 'has-error' : ''}}">
                            <input type="file" name="fImage" id="img" class="form-control hidden" onchange="changeImg(this)">
                            <img id="avatar"  src="{{ asset('uploads/images/'.$post->image ?? 'layout/backend/img/new_seo-10-512.png') }}">
                            <strong class="help-block" role="alert">
                                {{ $errors->first('fImage') }}
                            </strong>
                        </div>
                        <legend>Hình ảnh chi tiết</legend>
                        <div class="form-group">
                            <div class="progress">
                                <div id="progressBar" class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0%
                                </div>
                            </div>
                            <div id="image_preview">
                                <div id="uploaded-ads-image-wrap">
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
                                </div>
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
                        <legend>Thông tin địa điểm</legend>
                        <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                            <label for="category_name" class="col-sm-3 control-label">Thành phố</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" id="city_id" name="city_id">
                                    <option value="">Chọn thành phố</option>
                                    @foreach ($cities as $city)
                                        <option {{ $city->id == $post->district->city->id ? 'selected' : ''}} value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('city_id') }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
                            <label for="category_name" class="col-sm-3 control-label">Quận/huyện</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" id="district_id" name="district_id">
                                        <option value="">Chọn Quận/huyện</option>
                                </select>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('district_id') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                            <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" value="{{ old('address',$post->address) }}" name="address" placeholder="Địa chỉ">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('address') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
                            <label for="latitude" class="col-sm-3 control-label">Vĩ độ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly id="latitude" value="{{ old('latitude',$post->latitude) }}" name="latitude"
                                    placeholder="Latitude">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('latitude') }}
                                    </strong>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
                            <label for="longitude" class="col-sm-3 control-label">Kinh độ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly id="longitude" value="{{ old('longitude',$post->longitude) }}" name="longitude" placeholder="Longitude">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('longitude') }}
                                </strong>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p><i class="fa fa-info-circle"></i> Click on the below map to get your location and
                                save </p>
                        </div>
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <a href="javascript:void(0)" class="btn btn-primary pull-right m-t-07" onclick="getGeolocation();">Get your current location</a>

                        <div id="map" style="width: 100%; height: 400px; margin: 20px 0;"></div>
                        <legend>Lịch đăng tin</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Loại tin rao</label>
                            <div class="col-md-8">
                                <select name="type_id" readonly class="form-control col-md-4">
                                    @foreach ($post_type as $type)
                                        <option {{ old('type_id',$post->type_id) == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Ngày bắt đầu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control datetimepicker" readonly id="start_date" name="start_date" value="{{ old('start_date',$post->start_date) }}">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('start_date') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Ngày kết thúc</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control datetimepicker" readonly id="end_date" name="end_date" value="{{ old('end_date',$post->end_date) }}">
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('end_date') }}
                                </strong>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <i class="fa fa-pencil"></i>
                                <strong id="type-name"></strong> :
                            </label>
                            <label class="control-label m-l-10" id="type-description"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <i class="fa fa-money"></i>
                                <strong> Đơn giá :</strong>
                            </label>
                            <label class="control-label m-l-10" id="type-price"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <i class="fa fa-calendar"></i>
                                <strong> Số ngày :</strong>
                            </label>
                            <label class="control-label m-l-10" id="day-between">0 ngày</label>
                        </div>

                        <input type="hidden" class="diff-date" value="0">
                        <input type="hidden" class="price" value="0" >
                        <legend>Thành tiền</legend>
                        <div class="col-md-offset-1">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Phí đăng tin</th>
                                        <th>VAT (10%)</th>
                                        <th></th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="pricePost">0 đồng</td>
                                        <td id="vat">0 đồng</td>
                                        <td></td>
                                        <td id="totalPrice">0 đồng</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
<link rel="stylesheet" href="{{ asset('layout/backend/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('layout/backend/js/moment.min.js') }}"></script>
<script src="{{ asset('layout/backend/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('layout/backend/js/myscript/custom.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/post-edit.js')}}"></script>
<script src="{{ asset('layout/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('layout/editor/ckfinder/ckfinder.js')}}"></script>
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script src="{{ asset('layout/backend/js/myscript/map.js')}}"></script>
<script src="{{ asset('layout/backend/js/jquery.number.min.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/datetime-custom.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQuDQmtiHkS7CcriyEiYXWja3ODrG4vFI&callback=initMap&libraries=places"></script>
<script>
    function loadPrice() {
        if ($(".diff-date").val() && $(".price").val()) {

            let price = $(".diff-date").val() * $(".price").val();
            let price_format = $.number(price);
            $("#pricePost").html(price_format + " đồng");

            let vat = $(".diff-date").val() * $(".price").val() / 10;
            let vat_format = $.number(vat);
            $("#vat").html(vat_format + " đồng");

            let total_price = vat + price;
            let total_format = $.number(total_price);
            $("#totalPrice").html(total_format + " đồng");
        }else{
            return false;
        }
    }
    $(document).ready(function () {
        $("[name='type_id']").on('change',function(){
            loadPostType($(this).val());
        });
        if ($("[name='type_id']").val()) {
            var type_id = $("[name='type_id']").val();
            loadPostType(type_id);
        }
    function loadPostType(type) {
        $.ajax({
            type: "get",
            url: "{{ route('ajax.post-type') }}",
            data: {
                "type" : type
            },
            dataType: "json",
            success: function (data) {
                $("#type-name").html(data.name);
                $("#type-description").html(data.description);
                $(".price").val(data.price);
                let number_format = $.number(data.price);
                $("#type-price").html(number_format + " đồng / Ngày");
                loadPrice();
            }
        });
    }
});
</script>
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
</script>
@endpush
