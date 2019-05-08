<div class="img-wrapper" id="image-{{ $image->id }}">
    <img src="{{ asset('uploads/images/'.$image->path) }}" class="img-responsive">
    <div class="img-action-wrap">
        <a href="javascript:void(0)" id="{{ $image->id }}" class="imgDeleteBtn"><i class="fa fa-trash-o"></i>
        </a>
    </div>
</div>
