@extends('frontend.master')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Create post </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-10 col-xs-12">
                    <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" id="adsPostForm"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <legend>Post Info</legend>
                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Property Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ad_title"
                                    value="{{ old('title') }}" name="title" placeholder="Title">

                                <p class="text-info"> 70-100 character will be great title</p>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="description" class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control"
                                    rows="8">{{ old('description') }}</textarea>

                                <p class="text-info"> A description will help user to know details about your
                                    product</p>
                            </div>
                        </div>

                        <div class="form-group required ">
                            <label class="col-md-4 control-label">Property Type </label>
                            <div class="col-md-8">
                                @foreach ($property_types as $type)
                                <label class="radio-inline">
                                    <input type="radio" value="{{ $type->slug }}" class="" name="property_type">
                                    {{ $type->name }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="purpose" class="col-sm-4 control-label">Purpose</label>
                            <div class="col-sm-8">
                                <select class="form-control select2NoSearch" name="purpose" id="purpose">
                                    <option value="sale">Sale</option>
                                    <option value="rent">Rent</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">VND</span>
                                    <input type="text" placeholder="Ex: 10000000" class="form-control" name="price"
                                        id="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="negotiable" id="negotiable">
                                        Negotiable </label>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-offset-4">

                                <p class="text-info">Pick a good price. </p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Unit:</label>
                            <div class="col-sm-4">
                                <select class="form-control select2NoSearch" name="price_unit">
                                    <option value="sqft">Square feet</option>
                                    <option value="sqmeter">Square meter</option>
                                    <option value="acre">Acre</option>
                                    <option value="hector">Hector</option>
                                </select>
                                <span class="help-inline">&nbsp;</span>
                            </div>
                        </div>


                        <legend>Property Detail</legend>

                        <div class="form-group ">
                            <label for="square_unit_space" class="col-sm-4 control-label">Square Unit Space</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="square_unit_space" value=""
                                    name="square_unit_space" placeholder="Square Unit Space">

                                <p class="help-block">Unit should be match with price unit, if any </p>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="floor" class="col-sm-4 control-label">Floor</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="floor" value="" name="floor"
                                    placeholder="Ex: 1st or 2nd or 10th">

                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="beds" class="col-sm-4 control-label">Beds</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="beds" value="" name="beds"
                                    placeholder="Beds">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="attached_bath" class="col-sm-4 control-label">Attached bath(s)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="attached_bath" value=""
                                    name="attached_bath" placeholder="Attached bath(s)">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="common_bath" class="col-sm-4 control-label">Common bath(s)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="common_bath" value="" name="common_bath"
                                    placeholder="Common bath(s)">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="balcony" class="col-sm-4 control-label">Balcony(ies)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="balcony" value="" name="balcony"
                                    placeholder="Balcony(ies)">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="additional_details" class="col-sm-4 control-label">Additional details</label>
                            <div class="col-sm-8">
                                <label><input type="checkbox" value="1" name="dining_space" /> Dining space </label>
                                <label><input type="checkbox" value="1" name="living_room" /> Living room </label>
                            </div>
                        </div>

                        <legend>Conveniences</legend>

                        <div class="form-group">
                            <div class="col-sm-12 m-b-10">
                                <h5>Exterior</h5>
                                @foreach ($conveniences as $convenience)
                                @if ($convenience->type == "exterior")
                                <div class="checkbox col-md-4">
                                <label>
                                    <input type="checkbox" value="{{ old('conveniences',$convenience->id) }}"
                                        name="conveniences[]"> {{ $convenience->name }}
                                </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-sm-12">
                                <h5>Interior</h5>
                                @foreach ($conveniences as $convenience)
                                @if ($convenience->type == "interior")
                                <div class="checkbox col-md-4">
                                <label>
                                    <input type="checkbox" value="{{ old('conveniences',$convenience->id) }}"
                                        name="conveniences[]"> {{ $convenience->name }}
                                </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <legend>Distances</legend>
                        @foreach ($distances as $distance)
                        <div class="form-group">
                                <label class="col-lg-3 control-label">{{ ucwords($distance->name) }}</label>
                                <div class="col-lg-6">
                                    <input type="number" placeholder="{{ ucwords($distance->name) }}" class="form-control" value=""  name="distances[{{ $distance->id }}]">
                                </div>
                                <div class="col-lg-3">
                                    meters
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <legend>Image</legend>
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
                        <legend>Location Info</legend>

                        <div class="form-group">
                                <label for="category_name" class="col-sm-4 control-label">Thành phố</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="city_id" name="city_id">
                                        <option value="">Chọn thành phố</option>
                                        @foreach ($cities as $city)
                                            <option {{ $city->id == old('city_id') ? 'selected' : ''}} value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="category_name" class="col-sm-4 control-label">Quận/huyện</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="district_id" name="district_id">
                                            <option value="">Chọn Quận/huyện</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Latitude</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="latitude" value="" name="latitude"
                                    placeholder="Latitude">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Longitude</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="longitude" value="" name="longitude"
                                    placeholder="Longitude">
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p><i class="fa fa-info-circle"></i> Click on the below map to get your location and
                                save </p>
                        </div>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="map" style="width: 100%; height: 400px; margin: 20px 0;"></div>
                        <legend>Agent Info</legend>

                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Agent name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_name" value="John Doe"
                                    name="seller_name" placeholder="Agent name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Agent email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="seller_email" value="admin@demo.com"
                                    name="seller_email" placeholder="Agent email">

                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Agent phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_phone" value="234546"
                                    name="seller_phone" placeholder="Agent phone">

                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="address" class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" value="817 Reppert Coal Road"
                                    name="address" placeholder="Address">

                                <p class="text-info">Address line will help buyer to know about your location more
                                    specifically</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Save new ad</button>
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
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
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
            var old_purpose = "{{ old('purpose') }}";
            var old_unit = "{{ old('unit') }}";
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
@endpush
