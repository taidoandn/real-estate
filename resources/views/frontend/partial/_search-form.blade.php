<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="modern-top-hom-cat-section">
                <div class="modern-home-search-bar-wrap">
                    <div class="search-wrapper">
                        <h3> <i class="fa fa-home"></i> Tìm kiếm</h3>

                        <form class="form-inline" action="{{ route('getSearch') }}" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" id="searchTerms" name="q" value="" placeholder="Từ khóa" />
                            </div>

                            <div class="form-group">
                                <select class="form-control select2" id="city" name="city_id">
                                    <option value="">Chọn thành phố</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control select2" id="district" name="district_id">
                                    <option value="">Chọn Quận/huyện</option>
                                </select>
                            </div>

                            <button type="submit" class="btn theme-btn"> <i class="fa fa-search">
                                </i> Tìm kiếm</button>
                        </form>

                        <div class="or-search"> hoặc </div>

                        <a href="{{ route('getSearch') }}" class="btn btn-info btn-lg"><i class="fa fa-search-plus"></i>
                            Tim kiếm nâng cao</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
