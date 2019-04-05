<div class="row">
    <div class="col-sm-12">
        <div class="listingTopFilterBar">
            <span class="totalFoundListingTop">
                @if ($keyword)
                Found <strong>{{ $posts->total() }}</strong> results with keyword <span class="badge badge-info">
                    {{ $keyword }}</span>
                @else
                Total <strong>{{ $posts->total() }}</strong> posts found
                @endif

            </span>

            <ul class="listingViewIcon pull-right">
                <li class="dropdown shortByListingLi">
                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown"
                        class="dropdown-toggle" href="#">Short by <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="sortList">
                        <li class="{{ $sort == 'price_desc' ? 'active' : ''}}"><a href="javascript::void(0)" data-sort="price_desc">Price
                                high to low</a></li>
                        <li class="{{ $sort == 'price_asc' ? 'active' : ''}}"><a href="javascript::void(0)" data-sort="price_asc">Price
                                low to high</a></li>
                        <li class="{{ $sort == 'latest' ? 'active' : ''}}"><a href="javascript::void(0)" data-sort="latest">Latest</a>
                        </li>
                    </ul>
                </li>

                <li><a href="javascript:void(0)" id="showGridView">
                        <i class="fa fa-th-large"></i> </a> </li>
                <li><a href="javascript:void(0)" id="showListView">
                        <i class="fa fa-list"></i> </a> </li>
            </ul>
        </div>
    </div>
</div>
<div class="ad-box-wrap">
    <h3>Listing results</h3>
    @if (count($posts)>0)
    <div class="ad-box-grid-view" style="display: {{ $grid === 'true' ? 'block' : 'none' }}; ">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="ads-item-thumbnail ad-box-regular">
                    <div class="ads-thumbnail">
                        <a href="{{ $post->url }}">
                            <img src="{{ asset('uploads/images/'.$post->image) }}" height="400px" class="img-bordered"
                                alt="{{ $post->title }}">
                            <span class="modern-sale-rent-indicator">
                                {{ ucfirst($post->purpose) }}
                            </span>
                        </a>
                    </div>
                    <div class="caption">
                        <h4>
                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                <span>{{ str_limit($post->title, 30) }} </span>
                            </a>
                        </h4>

                        <p class="price">
                            <h5 class="text-warning">{!! $post->priceFormat !!} </h5>
                        </p>

                        <table class="table table-responsive property-box-info">
                            <tr>
                                <td>
                                    <a class="location text-muted" href="#">
                                        <i class="fa fa-map-marker"></i>
                                        {{ str_limit($post->district->city->name ." / ".$post->district->name, 16) }}
                                    </a>
                                </td>
                                <td>
                                    <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i>
                                        {{ $post->created_at->diffForHumans() }}</p>
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
        </div>
    </div>

    <div class="ad-box-list-view" style="display: {{ $grid === 'true' ? 'none' : 'block' }};">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    @foreach ($posts as $post)
                    <tr class="ad-regular">
                        <td width="200px">
                            <a href="{{ $post->url }}">
                                <img src="{{ asset('uploads/images/'.$post->image) }}" class="img-responsive"
                                    alt="{{ $post->title }}">
                                <span class="modern-sale-rent-indicator">
                                    {{ ucfirst($post->purpose) }}
                                </span>
                            </a>
                        </td>
                        <td>
                            <h4><a href="{{ $post->url }}">{{ $post->title }}</a> </h4>
                            <p class="price">
                                <h5 class="text-warning">{!! $post->priceFormat !!} </h5>
                            </p>
                            <p class="text-muted">
                                <i class="fa fa-map-marker"></i> <a class="location text-muted">
                                    {{ $post->district->city->name }} / {{ $post->district->name }}</a> ,
                                <i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans() }}
                            </p>

                            <p class="listViewItemFooter">
                                <span> <i class="fa fa-building"></i> {{ $post->property_type->name }} </span>

                                <span> <i class="fa fa-arrows-alt "></i> {{ $post->area }} m<sup>2</sup> </span>

                                <span>
                                    <i class="fa fa-bed"></i> {{ $post->detail->bed_room }} Bedroom(s) </span>
                                <span>{{ $post->detail->floor }} Floor(s)</span>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <h1>No data found</h1>
        </div>
    </div>
    @endif
</div>
<div class="text-center">
    {{ $posts->appends(request()->except(['page','district_id','city_id','q']))->links() }}
</div>
