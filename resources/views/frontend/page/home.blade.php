@extends('frontend.master')
@section('title','Home')
@section('content')
<div class="modern-top-intoduce-section">
    @include('frontend.partial.search-form')
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="{{ route('getSearch') }}">
                        New Posts [More <i class="fa fa-link"></i>]
                    </a>
                </h4>
            </div>
            <hr />
            <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                @foreach ($latest_posts as $post)
                <div>
                    <div class="ads-item-thumbnail ad-box-regular">
                        <div class="ads-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{ asset('uploads/images/'.$post->image) }}" class="img-responsive" alt="">

                                <span class="modern-sale-rent-indicator">
                                    {{ ucfirst($post->purpose) }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a href="{{ $post->url }}" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{!! $post->priceFormat !!}
                                    @if ($post->negotiable == 1)
                                    (Negotiable)
                                    @endif
                                </span>
                            </p>

                            <table class="table table-responsive property-box-info">
                                <tr>
                                    <td>
                                        <a class="location text-muted">
                                            <i class="fa fa-map-marker"></i> {{ str_limit($post->district->city->name ." / ".$post->district->name, 16) }} </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="far fa-clock"></i> {{ $post->created_date }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} m<sup>2</sup></td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Bedroom(s)</td>
                                    <td> {{ $post->detail->floor }} Floor(s) </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- themeqx_new_premium_ads_wrap -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $(".themeqx_new_premium_ads_wrap").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 10,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 3,
                    nav: false,
                    loop: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            },
            navText: ['<i class="fa fa-arrow-circle-o-left"></i>',
                '<i class="fa fa-arrow-circle-o-right"></i>'
            ]
        });
    });

    $(document).ready(function () {
        $(".themeqx_new_regular_ads_wrap").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            margin: 10,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 3,
                    nav: false,
                    loop: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            },
            navText: ['<i class="fa fa-arrow-circle-o-left"></i>',
                '<i class="fa fa-arrow-circle-o-right"></i>'
            ]
        });
    });
    $(document).ready(function () {
        $(".home-latest-blog").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 10,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 3,
                    nav: false,
                    loop: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            },
            navText: ['<i class="fa fa-arrow-circle-o-left"></i>',
                '<i class="fa fa-arrow-circle-o-right"></i>'
            ]
        });
    });

</script>
<script>
    $(document).ready(function () {
        var old_district_id = '{{ request()->district_id ?? null }}';
        $('select[name="city_id"]').change(function () {
            $('select[name="district_id"]').select2('val',"");
            var city_id = $(this).val();
            $.ajax({
                type : 'get',
                url : '{{ route('ajax.districts') }}',
                data : { city_id : city_id },
                success : function (data) {
                    getDistrict(data);
                }
            });
        });
        if($('select[name="city_id"]').val()) {
            var city_id = $('select[name="city_id"]').val();
            $.ajax({
                type : 'get',
                url : '{{ route('ajax.districts') }}',
                data : { city_id : city_id },
                success : function (data) {
                    getDistrict(data,old_district_id);
                }
            });
        }
    });

    function getDistrict(data,district_id = null){
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
</script>
@endpush
