<div class="panel">
    <div class="panel-header">
        <h5>{{ $label. ' '.$i }} </h5>
    </div>

    <div class="panel-body">
        @hasAccess('admin.media.index')
        <div class="panel-image">
            @if (is_null($banner->image->path))
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <img class="hide">
            @else
            <img src="{{ $banner->image->path }}" alt="Banner">
            @endif

            <input type="hidden" name="translatable[{{ $name }}_file_id]" value="{{ $banner->image->id }}"
                class="banner-file-id">

        </div>
        @endHasAccess

        <div class="panel-content clearfix">
            <div class="form-group">
                <label for="{{ $name }}-call-to-action-url">{{ trans("fpt::attributes.name_featured") }}</label>
                <input type="text" name="{{ $name }}_call_to_action_url" value="{{ $banner->call_to_action_url }}"
                    class="form-control" id="{{ $name }}-call-to-action-url">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                    <div class="form-group">
                        <label for="{{ $name }}-feature_desc">{{ trans("fpt::attributes.description") }}</label>
                        <textarea name="{{ $name }}_feature_desc" class="form-control"
                            id="{{ $name }}-feature_desc">{{ $banner->feature_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
