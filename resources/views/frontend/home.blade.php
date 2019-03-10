@extends('frontend.master')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="https://demo.themeqx.com/themeqxestate/listing">
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
                            <a href="https://demo.themeqx.com/themeqxestate/ad/exclusive-flat-in-cheap-price-in-rome">
                                <img src="{{ asset('uploads/images')."/".$post->image }}" class="img-responsive" alt="">

                                <span class="modern-sale-rent-indicator">
                                    {{ ucfirst($post->purpose) }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a href="" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{{ number_format($post->price,0,',','.') }} VNĐ
                                    @if ($post->negotiable == 1)
                                    (Negotiable)
                                    @endif
                                </span>
                            </p>

                            <table class="table table-responsive property-box-info">

                                <tr>
                                    <td>
                                        <a class="location text-muted">
                                            <i class="fa fa-map-marker"></i> {{ $post->city->name }} </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="far fa-clock"></i> 1 year ago</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} sqft</td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Bedroom(s)</td>
                                    <td> {{ $post->detail->floor }} Floor(s) </td>
                                </tr>

                            </table>

                        </div>
                        <div class="ribbon-wrapper-red">
                            <div class="ribbon-red">Urgent</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- themeqx_new_premium_ads_wrap -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="https://demo.themeqx.com/themeqxestate/listing">
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
                            <a href="https://demo.themeqx.com/themeqxestate/ad/exclusive-flat-in-cheap-price-in-rome">
                                <img src="{{ asset('uploads/images')."/".$post->image }}" class="img-responsive" alt="">

                                <span class="modern-sale-rent-indicator">
                                    {{ ucfirst($post->purpose) }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a href="" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{{ number_format($post->price,0,',','.') }} VNĐ
                                    @if ($post->negotiable == 1)
                                    (Negotiable)
                                    @endif
                                </span>
                            </p>

                            <table class="table table-responsive property-box-info">

                                <tr>
                                    <td>
                                        <a class="location text-muted">
                                            <i class="fa fa-map-marker"></i> {{ $post->city->name }} </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="far fa-clock"></i> 1 year ago</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} sqft</td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Bedroom(s)</td>
                                    <td> {{ $post->detail->floor }} Floor(s) </td>
                                </tr>

                            </table>

                        </div>
                        <div class="ribbon-wrapper-red">
                            <div class="ribbon-red">Urgent</div>
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
@endpush
