@extends('backend.master')
@section('title','Thêm bài viết')
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
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('POST')
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-12">
                            <legend>Thông tin</legend>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                <label for="title" class="col-md-2 control-label">Tiêu đề</label>
                                <div class="col-md-8">
                                    <input type="text" id="title" class="form-control" value="{{ old('title') }}" name="title"
                                        placeholder="Nhập tiêu đề">
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('title') }}
                                        </strong>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-2 control-label">Thông tin mô tả</label>
                                <div class="col-md-8">
                                    <textarea id="description" class="ckeditor form-control" name="description">
										{{ old('description') }}
									</textarea>
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('description') }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('property_id') ? 'has-error' : ''}}">
                                <label for="property_id" class="col-md-4 control-label">Loại bất động sản</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" id="property_id" name="property_id">
                                        @foreach ($property_types as $property)
                                        <option {{ old('property_id') == $property->id ? 'selected' : '' }} value="{{ $property->id }}">{{$property->name}}</option>
                                        @endforeach
                                    </select>
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('type_id') }}
                                    </strong>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label">Hình thức</label>
                                <div class="radio col-md-8">
                                    <select name="purpose" id="purpose" class="form-control">
                                        <option value="">Chọn hình thức</option>
                                        <option {{ old('purpose') == 'sale'? 'selected' : '' }} value="sale">Bán</option>
                                        <option {{ old('purpose') == 'rent' ? 'selected' : '' }} value="rent">Cho thuê</option>
                                    </select>
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('purpose') }}
                                    </strong>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label">Giá (VNĐ)</label>
                                <div class="col-md-8">
                                    <input type="text" name="price" value="{{ old('price') ?: null}}" class="form-control"
                                        id="">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('price') }}
                                    </strong>
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
                                    <input type="text" name="area" value="{{ old('area') ?: null}}" class="form-control">
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('area') }}
                                    </strong>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="area" class="col-md-4 control-label">Trạng thái</label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control">
                                        <option {{ old('status') == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                        <option {{ old('status') == 'published' ? 'selected' : ''}} value="published">Published</option>
                                        <option {{ old('status') == 'blocked' ? 'selected' : ''}} value="blocked">Blocked</option>
                                    </select>
                                    <strong class="help-block" role="alert">
                                        {{ $errors->first('status') }}
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                                    <label for="area" class="col-md-4 control-label">Người đăng</label>
                                    <div class="col-md-8">
                                        <select name="user_id" class="form-control">
                                            <option value="">Chọn người đăng</option>
                                            @foreach ($users as $user)
                                                <option {{ old('user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('user_id') }}
                                        </strong>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Thỏa thuận</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {{ old('negotiable') == 1 ? 'checked' : '' }} value="1" name="negotiable"> </label>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('fImage') ? 'has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Hình ảnh</label>
                                <input id="img" type="file" name="fImage" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar" src="{{ asset('layout/backend/img/new_seo-10-512.png') }}">
                                <strong class="help-block m-l-80" role="alert">
                                    {{ $errors->first('fImage') }}
                                </strong>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <legend>Ảnh chi tiết</legend>
                            <div class="form-group {{ $errors->has('fImageDetails.*') ? 'has-error' : '' }}">
                                <input type="file" name="fImageDetails[]" class="m-l-10" id="fImageDetails" multiple>
                                <strong class="help-block" role="alert">
                                    {{ $errors->first('fImageDetails.*') }}
                                </strong>
                            </div>
                            <div id="image_preview">
                            </div>
                        </div>

                        <div class="col-md-6  m-t-10">
                            <legend>Chi tiết</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số tầng</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ old('floor') ?? null }}" placeholder="floor"
                                        name="floor" class="form-control">
                                </div>
                                <strong class="help-block">tầng</strong>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số phòng ngủ</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ old('bed_room') ?? null }}" placeholder="bed_room"
                                        name="bed_room" class="form-control">
                                </div>
                                <strong class="help-block">phòng</strong>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Số phòng tắm</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ old('bath') ?? null }}" placeholder="bath"
                                        name="bath" class="form-control">
                                </div>
                                <strong class="help-block">phòng</strong>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ban công</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" value="{{ old('balcony') ?? null }}" placeholder="balcony"
                                        name="balcony" class="form-control">
                                </div>
                                <strong class="help-block">chỗ</strong>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Toilet</label>
                                <div class="col-md-6">
                                    <input type="number" value="{{ old('toilet') ?? null }}" min="0" placeholder="toilet"
                                        name="toilet" class="form-control">
                                </div>
                                <strong class="help-block">cái</strong>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label m-r-10">Bổ sung</label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" {{ old('living_room')  ? 'checked' :null }} name="living_room">Phòng
                                            khách</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" {{ old('dinning_room')  ? 'checked' :null }} name="dinning_room">Phòng
                                            ăn</label>
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
                                        class="form-control" value="{{ old('distances.'.$distance->id) ?? null }}">
                                </div>
                                <strong class="help-block">meters</strong>
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
                                                    {{ in_array($convenience->id, old('conveniences', [])) ? 'checked' : '' }}
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
                                            <label><input type="checkbox" name="conveniences[]"
                                                {{ in_array($convenience->id, old('conveniences', [])) ? 'checked' : '' }}
                                                    value="{{ $convenience->id }}">{{
                                                $convenience->name }}</label>
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
                                <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Thành phố</label>
                                    <div class="col-md-8">
                                        <select name="city_id" id="city" class="form-control select2">
                                            <option value="">Chọn thành phố</option>
                                            @foreach ($cities as $city)
                                            <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('city_id') }}
                                        </strong>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Quận Huyện</label>
                                    <div class="col-md-8">
                                        <select name="district_id" id="district_id" class="form-control select2">
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('district_id') }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Địa chỉ</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ old('address') ?? '' }}" name="address"
                                            id="address">
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('address') }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Vĩ độ</label>
                                    <div class="col-md-8">
                                        <input readonly type="text" class="form-control" value="{{ old('latitude') ?? '' }}"
                                            name="latitude" id="latitude">
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('latitude') }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Kinh độ</label>
                                    <div class="col-md-8">
                                        <input readonly type="text" class="form-control" value="{{old('longitude') ?? '' }}"
                                            name="longitude" id="longitude">
                                        <strong class="help-block" role="alert">
                                            {{ $errors->first('longitude') }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="javascript:void(0)" id="btn-geolocation" class="btn bg-blue pull-right m-r-10" onclick="getGeolocation();">Get your current location</a>
                                </div>
                            </div>
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div class="col-md-6">
                                <div id="map" style="width: 100%; height: 400px; margin: 20px 0;"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <legend>Lịch đăng tin</legend>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Loại tin rao</label>
                                <div class="col-md-8">
                                    <select name="type_id" class="form-control col-md-4">
                                        @foreach ($post_type as $type)
                                            <option {{ old('type_id') == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ngày bắt đầu</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control datetimepicker" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ngày kết thúc</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control datetimepicker" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                </div>
                            </div>
                        </div>
                            <div class="col-md-5">
                                <div class="m-l-20 m-t-05">
                                    <p>
                                        <strong>
                                            <i class="fa fa-pencil margin-r-5"></i>
                                            <span id="type-name"></span>
                                        </strong> :
                                        <span id="type-description"></span>
                                    </p>

                                    <p>
                                        <strong>
                                            <i class="fa fa-money margin-r-5"></i> Đơn giá :
                                        </strong>
                                        <span class="text-red" id="type-price"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="m-l-20 m-t-05">
                                    <p>
                                        <strong>
                                            <i class="fa fa-calendar margin-r-5"></i> Số ngày :
                                        </strong>
                                        <span id="day-between"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="diff-date" value="0">
                        <input type="hidden" class="price" value="0" >
                        <div class="col-md-12">
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
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn bg-blue" value="Thêm mới" name="btn-add">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('layout/backend/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('layout/backend/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/map.css')}}">
@endpush
@push('script')
<script src="{{ asset('layout/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('layout/backend/js/moment.min.js') }}"></script>
<script src="{{ asset('layout/backend/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('layout/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/custom.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/map.js')}}"></script>
<script src="{{ asset('layout/backend/js/jquery.number.min.js')}}"></script>
<script src="{{ asset('layout/backend/js/myscript/datetime-custom-add.js')}}"></script>
{{-- Google API --}}
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
    $(document).ready(function () {
        $('.select2').select2();

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
            var old_purpose = '{{ old('purpose') ? old('purpose') : "" }}';
            var old_unit = '{{ old('unit') ? old('unit') : "" }}';
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
            var district_id = '{{ old("district_id") ?? null }}'
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
    @if($errors)
    @foreach ($errors->all() as $error)
    <script> toastr.error('{{ $error }}')</script>
    @endforeach
    @endif
@endpush
