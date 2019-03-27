@extends('frontend.master')
@section('content')
<div class="container">
    <div id="wrapper">
        @include('frontend.partial._sidebar')

        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Post an ad </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-md-10 col-xs-12">
                    <form method="POST" action="{{ route('posts.store') }}"
                        accept-charset="UTF-8" id="adsPostForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <legend>Ad Info</legend>

                        <div class="form-group ">
                            <label for="ad_title" class="col-sm-4 control-label">Property Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ad_title" value="" name="ad_title"
                                    placeholder="Property Name">

                                <p class="text-info"> 70-100 character will be great title</p>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="ad_description" class="col-sm-4 control-label">Ad description</label>
                            <div class="col-sm-8">
                                <textarea name="ad_description" class="form-control" rows="8"></textarea>

                                <p class="text-info"> A description will help user to know details about your
                                    product</p>
                            </div>
                        </div>



                        <div class="form-group required ">
                            <label class="col-md-4 control-label">Property Type </label>
                            <div class="col-md-8">
                                <label for="type_apartment" class="radio-inline">
                                    <input type="radio" value="apartment" id="type_apartment" name="type">
                                    Apartment </label>

                                <label for="type_condos" class="radio-inline">
                                    <input type="radio" value="condos" id="type_condos" name="type">
                                    Condos </label>

                                <label for="type_house" class="radio-inline">
                                    <input type="radio" value="house" id="type_house" name="type">
                                    House </label>

                                <label for="type_land" class="radio-inline">
                                    <input type="radio" value="land" id="type_land" name="type">
                                    Land </label>

                                <label for="type_commercial_space" class="radio-inline">
                                    <input type="radio" value="commercial_space" id="type_commercial_space" name="type">
                                    Commercial space </label>

                                <label for="type_villa" class="radio-inline">
                                    <input type="radio" value="villa" id="type_villa" name="type">
                                    Villa </label>


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

                        <div class="form-group  ">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">EUR</span>
                                    <input type="text" placeholder="Ex. 15000" class="form-control" name="price"
                                        id="price" value="">
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
                            <label class="col-sm-4 control-label">Price per Unit:</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">EUR</span>
                                    <input type="text" class="form-control input-sm" placeholder="Price per Unit"
                                        value="" name="price_per_unit" id="price_per_unit">
                                </div>
                                <span class="help-inline">&nbsp;</span>
                            </div>
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

                        <legend>Amenities</legend>

                        <div class="form-group type_checkbox">
                            <div class="col-sm-12">
                                <label> <input type="checkbox" value="115" name="amenities[115]"> Air condition
                                </label>
                                <label> <input type="checkbox" value="116" name="amenities[116]"> Cable TV </label>
                                <label> <input type="checkbox" value="117" name="amenities[117]"> Balcony </label>
                                <label> <input type="checkbox" value="118" name="amenities[118]"> Lift </label>
                                <label> <input type="checkbox" value="119" name="amenities[119]"> Fire Extinguisher
                                </label>
                                <label> <input type="checkbox" value="120" name="amenities[120]"> Emergency Exit
                                </label>
                                <label> <input type="checkbox" value="121" name="amenities[121]"> Tiled Floor
                                </label>
                                <label> <input type="checkbox" value="122" name="amenities[122]"> Generator </label>
                            </div>
                        </div>


                        <legend>Distances</legend>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bus Station</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Bus Station" class="form-control" value=""
                                    name="distances[13]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Train station</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Train station" class="form-control" value=""
                                    name="distances[14]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Airport</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Airport" class="form-control" value=""
                                    name="distances[15]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Beach</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Beach" class="form-control" value=""
                                    name="distances[16]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Metro</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Metro" class="form-control" value=""
                                    name="distances[17]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bank</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Bank" class="form-control" value=""
                                    name="distances[18]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">School</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="School" class="form-control" value=""
                                    name="distances[19]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">University</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="University" class="form-control" value=""
                                    name="distances[20]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Resturent</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Resturent" class="form-control" value=""
                                    name="distances[21]">
                            </div>
                            <div class="col-lg-3">
                                meters
                            </div>
                        </div>
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
                            <label for="category_name" class="col-sm-4 control-label">State</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" id="state_select" name="state">
                                </select>
                                <p class="text-info">
                                    <span id="state_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group  ">
                            <label for="category_name" class="col-sm-4 control-label">City</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" id="city_select" name="city">
                                </select>
                                <p class="text-info">
                                    <span id="city_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i>
                                    </span>
                                </p>
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

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment Info</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="price_plan" class="col-sm-4 control-label">Price plan</label>
                                    <div class="col-sm-8">

                                        <div class="price_input_group">

                                            <label><input type="radio" value="regular" name="price_plan"
                                                    data-price="0" />Regular
                                            </label> <br />

                                            <label><input type="radio" value="premium" name="price_plan"
                                                    data-price="8" />Premium
                                            </label>

                                            <hr />
                                            <div class="addon-ad-charge">
                                                <label><input type="checkbox" class="mark_ad_urgent"
                                                        name="mark_ad_urgent" value="1" data-price="5" /> Mark as urgent
                                                </label>
                                            </div>

                                            <div class="well" id="price_summery" style="display: none;">
                                                Payable amount :
                                                <span id="payable_amount">3</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@section('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });
</script>
@endsection
