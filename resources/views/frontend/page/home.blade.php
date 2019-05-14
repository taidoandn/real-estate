@extends('frontend.master')
@section('title','Home')
@section('content')
<div class="modern-top-intoduce-section">
    @include('frontend.partial._search-form')
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="{{ route('getSearch') }}">
                        Bài viết mới [More <i class="fa fa-link"></i>]
                    </a>
                </h4>
            </div>
            <hr />
            <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                @foreach ($latest_posts as $post)
                <div>
                    <div
                        class="ads-item-thumbnail {{ $post->type->slug == "tin-vip" ? 'ad-box-premium' : 'ad-box-regular' }}">
                        <div class="ads-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{ asset('uploads/images/'.$post->image) }}" class="img-responsive" alt="">
                                <span class="modern-sale-rent-indicator">
                                    {{ $post->purpose_format }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a style="color : {{ $post->type->slug == 'tin-vip' ? 'red' : ($post->type->slug == 'tin-cao-cap' ? 'green' : '')}};"
                                    href="{{ $post->url }}" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{!! $post->priceFormat !!}
                                </span>
                                @if ($post->negotiable == 1)
                                <span class="badge badge-primary">Thỏa thuận</span>
                                @endif
                            </p>

                            <table class="table table-responsive property-box-info">
                                <tr>
                                    <td>
                                        <a class="location text-muted"
                                            title="{{ $post->district->city->name ." / ".$post->district->name }}">
                                            <i class="fa fa-map-marker"></i>
                                            {{ str_limit($post->district->city->name ." / ".$post->district->name, 16) }}
                                        </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i>
                                            {{ $post->created_date }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} m<sup>2</sup></td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Phòng ngủ</td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->detail->floor }} Tầng </td>
                                </tr>
                            </table>
                            @if ($post->type->slug == "tin-cao-cap")
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">Premium</div>
                            </div>
                            @endif
                            @if ($post->type->slug == "tin-vip")
                            <div class="ribbon-wrapper-red">
                                <div class="ribbon-red"><i class="fa fa-star"></i></div>
                            </div>
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">VIP</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- themeqx_new_premium_ads_wrap -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="{{ route('getSearch') }}">
                        Bài viết cao cấp [More <i class="fa fa-link"></i>]
                    </a>
                </h4>
            </div>
            <hr />
            <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                @foreach ($premium_posts as $post)
                <div>
                    <div
                        class="ads-item-thumbnail {{ $post->type->slug == "tin-vip" ? 'ad-box-premium' : 'ad-box-regular' }}">
                        <div class="ads-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{ asset('uploads/images/'.$post->image) }}" class="img-responsive" alt="">
                                <span class="modern-sale-rent-indicator">
                                    {{ $post->purpose_format }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a style="color : {{ $post->type->slug == 'tin-vip' ? 'red' : ($post->type->slug == 'tin-cao-cap' ? 'green' : '')}};"
                                    href="{{ $post->url }}" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{!! $post->priceFormat !!}
                                </span>
                                @if ($post->negotiable == 1)
                                <span class="badge badge-primary">Thỏa thuận</span>
                                @endif
                            </p>

                            <table class="table table-responsive property-box-info">
                                <tr>
                                    <td>
                                        <a class="location text-muted"
                                            title="{{ $post->district->city->name ." / ".$post->district->name }}">
                                            <i class="fa fa-map-marker"></i>
                                            {{ str_limit($post->district->city->name ." / ".$post->district->name, 16) }}
                                        </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i>
                                            {{ $post->created_date }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} m<sup>2</sup></td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Phòng ngủ</td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->detail->floor }} Tầng </td>
                                </tr>
                            </table>
                            @if ($post->type->slug == "tin-cao-cap")
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">Premium</div>
                            </div>
                            @endif
                            @if ($post->type->slug == "tin-vip")
                            <div class="ribbon-wrapper-red">
                                <div class="ribbon-red"><i class="fa fa-star"></i></div>
                            </div>
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">VIP</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- themeqx_new_premium_ads_wrap -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="carousel-header">
                <h4><a href="{{ route('getSearch') }}">
                        Bài viết Vip [More <i class="fa fa-link"></i>]
                    </a>
                </h4>
            </div>
            <hr />
            <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                @foreach ($vip_posts as $post)
                <div>
                    <div
                        class="ads-item-thumbnail {{ $post->type->slug == "tin-vip" ? 'ad-box-premium' : 'ad-box-regular' }}">
                        <div class="ads-thumbnail">
                            <a href="{{ $post->url }}">
                                <img src="{{ asset('uploads/images/'.$post->image) }}" class="img-responsive" alt="">
                                <span class="modern-sale-rent-indicator">
                                    {{ $post->purpose_format }}
                                </span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4>
                                <a style="color : {{ $post->type->slug == 'tin-vip' ? 'red' : ($post->type->slug == 'tin-cao-cap' ? 'green' : '')}};"
                                    href="{{ $post->url }}" title=""><span>{{ str_limit($post->title, 30) }}</span></a>
                            </h4>

                            <p class="price">
                                <span>{!! $post->priceFormat !!}
                                </span>
                                @if ($post->negotiable == 1)
                                <span class="badge badge-primary">Thỏa thuận</span>
                                @endif
                            </p>

                            <table class="table table-responsive property-box-info">
                                <tr>
                                    <td>
                                        <a class="location text-muted"
                                            title="{{ $post->district->city->name ." / ".$post->district->name }}">
                                            <i class="fa fa-map-marker"></i>
                                            {{ str_limit($post->district->city->name ." / ".$post->district->name, 16) }}
                                        </a>
                                    </td>
                                    <td>
                                        <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i>
                                            {{ $post->created_date }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <i class="fa fa-building"></i> {{ $post->property_type->name }} </td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->area }} m<sup>2</sup></td>
                                </tr>

                                <tr>
                                    <td><i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Phòng ngủ</td>
                                    <td><i class="fa fa-arrows-alt "></i> {{ $post->detail->floor }} Tầng </td>
                                </tr>
                            </table>
                            @if ($post->type->slug == "tin-cao-cap")
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">Premium</div>
                            </div>
                            @endif
                            @if ($post->type->slug == "tin-vip")
                            <div class="ribbon-wrapper-red">
                                <div class="ribbon-red"><i class="fa fa-star"></i></div>
                            </div>
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">VIP</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- themeqx_new_premium_ads_wrap -->
        </div>
    </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="carousel-header">
                    <h4><a href="{{ route('blogs.index') }}">
                            Blog mới nhất </a>
                    </h4>
                </div>
                <hr />

                <div class="home-latest-blog themeqx-carousel-blog-post">
                   @foreach ($latest_blogs as $blog)
                    <div>
                        <div class="image">
                            <a href="{{ $blog->url }}">
                                <img alt="{{ $blog->title }}" height="150px" src="{{ $blog->image_url ?? asset('layout/placeholder.png') }}">
                            </a>
                        </div>

                        <h2><a href="{{ $blog->url }}"
                                class="blog-title">{{ str_limit($blog->title, 30) }}</a></h2>

                        <div class="blog-post-carousel-meta-info">
                            <span class="pull-left">By {{ $blog->author }}</span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> {{ $blog->created_at->toDateTimeString() }}
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">
                            {!! str_limit($blog->content_html, 100) !!}
                        </p>
                        <a class="btn btn-default" href="{{ $blog->url }}">Tiếp tục xem <i class="fa fa-external-link"></i> </a>
                    </div>
                   @endforeach
                </div>
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
    var district_id = '{{ request()->district_id ?? null }}';
    $(document).ready(function () {
        $('select[name="city_id"]').change(function () {
            $('select[name="district_id"]').select2('val',"");
            var city_id = $(this).val();
            getDistrict(city_id);
        });
        if($('select[name="city_id"]').val()) {
            var city_id = $('select[name="city_id"]').val();
            getDistrict(city_id,district_id);
        }
    });
</script>
@endpush
