<div class="panel">
    <div class="panel-header">
        <h5>{{ $label }} </h5>
    </div>

    <div class="panel-body">
        @hasAccess('admin.media.index')
        <div class="panel-image">
            @if (is_null($banner_chinhsachbanhang->image->path))
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <img class="hide">
            @else
            <img src="{{ $banner_chinhsachbanhang->image->path }}" alt="Banner">
            @endif

            <input type="hidden" name="translatable[{{ $name }}_file_id]" value="{{ $banner_chinhsachbanhang->image->id }}"
                class="banner-file-id">
        </div>
        @endHasAccess

        <div class="panel-content clearfix">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                    <div class="form-group">
                        <label for="{{ $name }}-feature_desc">{{ trans("fpt::attributes.description") }}</label>
                        <textarea name="{{ $name }}_feature_desc" class="form-control wysiwyg"
                            id="{{ $name }}-feature_desc">{{ $banner_chinhsachbanhang->feature_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
