<div class="form-group">
    <label for="meta-title-{{$page}}" class="col-md-3 control-label text-left">
        {{ trans('meta::attributes.meta_title') }}
    </label>

    <div class="col-md-9">
        <input type="text"
            name="meta_title_of_{{$page}}"
            class="form-control"
            id="meta-title-{{$page}}"
            value="{{ setting('meta_title_of_'.$page) ?? '' }}"
        >
    </div>
</div>

<div class="form-group">
    <label for="meta-keyword-{{$page}}" class="col-md-3 control-label text-left">
        {{ trans('meta::attributes.meta_keyword') }}
    </label>

    <div class="col-md-9">
        <input type="text"
            name="meta_keyword_of_{{$page}}"
            class="form-control"
            id="meta-keyword-{{$page}}"
            value="{{ setting('meta_keyword_of_'.$page) ?? '' }}"
        >
    </div>
</div>

<div class="form-group">
    <label for="meta-description-{{$page}}" class="col-md-3 control-label text-left">
        {{ trans('meta::attributes.meta_description') }}
    </label>

    <div class="col-md-9">
        <textarea name="meta_description_of_{{ $page }}"
            class="form-control"
            id="meta-description-{{$page}}"
            rows="10"
            cols="10"
        >{{ setting('meta_description_of_'.$page) }}</textarea>
    </div>
</div>


