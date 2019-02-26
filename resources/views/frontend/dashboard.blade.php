@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="{{ asset('layout/frontend/css/admin.css') }}">
@endpush
@section('content')

    <div id="wrapper">
        @include('frontend.partial.navbar')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">12</div>
                                    <div>Approved ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">0</div>
                                    <div>Pending ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">0</div>
                                    <div>Blocked ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">7</div>
                                    <div>Agents</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">2</div>
                                    <div>Reports</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">9</div>
                                    <div>Successful payments</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge"> 88.00 <sup>EUR</sup></div>
                                    <div>Total Payment</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest 10 contact messages </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sender</th>
                                    <th>Message</th>
                                </tr>

                                <tr>
                                    <td>
                                        <i class="fa fa-user"></i> Md Hossain Shohel <br />
                                        <i class="far fa-envelope-o"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="721f1a011a1d1a171e4a4b32151f131b1e5c111d1f">[email&#160;protected]</a>
                                        <br />
                                        <i class="fa fa-clock-o"></i> 2 years ago
                                    </td>
                                    <td>Hi
                                        From Contact Message</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-user"></i> Md Hossain Shohel <br />
                                        <i class="fa fa-envelope-o"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="563839383316333b373f3a7835393b">[email&#160;protected]</a>
                                        <br />
                                        <i class="fa fa-clock-o"></i> 2 years ago
                                    </td>
                                    <td>This is a message
                                        Please reply me</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest 10 ads report </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <th>Reason</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Ad Info</th>
                                </tr>

                                <tr>
                                    <td>unavailable</td>
                                    <td> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="09686d646067496d6c6466276a6664">[email&#160;protected]</a>
                                    </td>
                                    <td>
                                        This is fraud ads
                                        <hr />
                                        <p class="text-muted"> <i>Date Time: 30/12/2016 4:21 PM</i></p>
                                    </td>
                                    <td>
                                        <a href="https://demo.themeqx.com/themeqxestate/ad/cheap-flat-at-9th-floor-with-lift"
                                            target="_blank">View ad</a>
                                        <i class="clearfix"></i>
                                        <a href="https://demo.themeqx.com/themeqxestate/dashboard/u/posts/reports-by/cheap-flat-at-9th-floor-with-lift">
                                            <i class="fa fa-exclamation-triangle"></i> Reports : 1
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>offensive</td>
                                    <td> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0e7b7d6b7c4e6f7e6b76206d6163">[email&#160;protected]</a>
                                    </td>
                                    <td>
                                        This ad has an offensive content, please take a look
                                        Many Thanks
                                        <hr />
                                        <p class="text-muted"> <i>Date Time: 18/08/2016 6:16 PM</i></p>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
@push('js')

<script>
    function generate_option_from_json(jsonData, fromLoad) {
        //Load Category Json Data To Brand Select
        if (fromLoad === 'category_to_brand') {
            var option = '';
            if (jsonData.length > 0) {
                option += '<option value="0" selected> Select a Distance </option>';
                for (i in jsonData) {
                    option += '<option value="' + jsonData[i].id + '"> ' + jsonData[i].brand_name + ' </option>';
                }
                $('#brand_select').html(option);
                $('#brand_select').select2();
            } else {
                $('#brand_select').html('');
                $('#brand_select').select2();
            }
            $('#brand_loader').hide('slow');
        } else if (fromLoad === 'country_to_state') {
            var option = '';
            if (jsonData.length > 0) {
                option += '<option value="0" selected> Select state </option>';
                for (i in jsonData) {
                    option += '<option value="' + jsonData[i].id + '"> ' + jsonData[i].state_name + ' </option>';
                }
                $('#state_select').html(option);
                $('#state_select').select2();
            } else {
                $('#state_select').html('');
                $('#state_select').select2();
            }
            $('#state_loader').hide('slow');

        } else if (fromLoad === 'state_to_city') {
            var option = '';
            if (jsonData.length > 0) {
                option += '<option value="0" selected> Select city </option>';
                for (i in jsonData) {
                    option += '<option value="' + jsonData[i].id + '"> ' + jsonData[i].city_name + ' </option>';
                }
                $('#city_select').html(option);
                $('#city_select').select2();
            } else {
                $('#city_select').html('');
                $('#city_select').select2();
            }
            $('#city_loader').hide('slow');
        }
    }

    $(document).ready(function () {
        $('[name="category"]').change(function () {
            var category_id = $(this).val();
            $('#brand_loader').show();

            $.ajax({
                type: 'POST',
                url: 'https://demo.themeqx.com/themeqxestate/get-brand-by-category',
                data: {
                    category_id: category_id,
                    _token: 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa'
                },
                success: function (data) {
                    generate_option_from_json(data, 'category_to_brand');
                }
            });

            /*                $.ajax({
                            type : 'POST',
                            url : 'https://demo.themeqx.com/themeqxestate/get-category-info',
                            data : { category_id : category_id,  _token : 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa' },
                            success : function (data) {
                                if (data.category_slug == 'jobs'){
                                    alert('Jobs');
                                }
                            }
                        });
                        */
        });


        $('[name="country"]').change(function () {
            var country_id = $(this).val();
            $('#state_loader').show();
            $.ajax({
                type: 'POST',
                url: 'https://demo.themeqx.com/themeqxestate/get-state-by-country',
                data: {
                    country_id: country_id,
                    _token: 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa'
                },
                success: function (data) {
                    generate_option_from_json(data, 'country_to_state');
                }
            });
        });

        $('[name="state"]').change(function () {
            var state_id = $(this).val();
            $('#city_loader').show();
            $.ajax({
                type: 'POST',
                url: 'https://demo.themeqx.com/themeqxestate/get-city-by-state',
                data: {
                    state_id: state_id,
                    _token: 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa'
                },
                success: function (data) {
                    generate_option_from_json(data, 'state_to_city');
                }
            });
        });

        $("#images").change(function () {
            var fd = new FormData(document.querySelector("form#adsPostForm"));
            //$('#loadingOverlay').show();
            $('.progress').show();
            $.ajax({
                url: 'https://demo.themeqx.com/themeqxestate/dashboard/u/posts/upload-a-image',
                type: "POST",
                data: fd,

                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            //console.log(percentComplete);

                            var progress_bar =
                                '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: ' +
                                percentComplete + '%">' + percentComplete +
                                '% </div>';

                            if (percentComplete === 100) {
                                $('.progress').hide();
                            }
                        }
                    }, false);

                    return xhr;
                },

                cache: false,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function (data) {
                    //$('#loadingOverlay').hide('slow');
                    if (data.success == 1) {
                        $('#uploaded-ads-image-wrap').load(
                            'https://demo.themeqx.com/themeqxestate/dashboard/u/posts/append-media-image'
                        );
                    } else {
                        toastr.error(data.msg, 'Error!', toastr_options);
                    }
                }
            });
        });


        $('body').on('click', '.imgDeleteBtn', function () {
            //Get confirm from user
            if (!confirm('Are you sure want to delete this?')) {
                return '';
            }

            var current_selector = $(this);
            var img_id = $(this).closest('.img-action-wrap').attr('id');
            $.ajax({
                url: 'https://demo.themeqx.com/themeqxestate/dashboard/u/posts/delete-media',
                type: "POST",
                data: {
                    media_id: img_id,
                    _token: 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa'
                },
                success: function (data) {
                    if (data.success == 1) {
                        current_selector.closest('.creating-ads-img-wrap').hide('slow');
                        toastr.success(data.msg, 'Success!', toastr_options);
                    }
                }
            });
        });
        $('body').on('click', '.imgFeatureBtn', function () {
            var img_id = $(this).closest('.img-action-wrap').attr('id');
            var current_selector = $(this);

            $.ajax({
                url: 'https://demo.themeqx.com/themeqxestate/dashboard/u/posts/feature-media-creating',
                type: "POST",
                data: {
                    media_id: img_id,
                    _token: 'j71JeqROG0gGNwbgvsfizuSdUQpsCYgSLKAxANxa'
                },
                success: function (data) {
                    if (data.success == 1) {
                        $('.imgFeatureBtn').html('<i class="fa fa-star-o"></i>');
                        current_selector.html('<i class="fa fa-star"></i>');
                        toastr.success(data.msg, 'Success!', toastr_options);
                    }
                }
            });
        });

        $(document).on('change', '.price_input_group', function () {
            var price = 0;
            var checkedValues = $('.price_input_group input:checked').map(function () {
                return $(this).data('price');
            }).get();

            for (var i = 0; i < checkedValues.length; i++) {
                price += parseInt(checkedValues[i]); //don't forget to add the base
            }

            $('#payable_amount').text(price);
            $('#price_summery').show('slow');
        });


    });
</script>
@endpush
