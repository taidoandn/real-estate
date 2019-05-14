@extends('frontend.master')
@section('title','Search')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('frontend.search._sidebar')
        </div>
        <div class="col-md-9 filter-data">
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    var district_id = '{{ request()->district_id ?? null }}';
</script>
<script src="{{ asset('layout/frontend/js/myscript/load-district.js')}}"></script>
<script src="{{ asset('layout/frontend/js/myscript/filter-search.js')}}"></script>
@endpush
