{{-- {{ Form::text('name', trans('page::attributes.name'), $errors, $page, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('body', trans('page::attributes.body'), $errors, $page, ['labelCol' => 2, 'required' => true]) }}

<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('is_active', trans('page::attributes.is_active'), trans('page::pages.form.enable_the_page'), $errors, $page) }}
    </div>
</div> --}}

{{-- Add Page like Post   --}}
{{ Form::text('name', null, $errors, $page, ['labelCol' => 0, 'placeholder' => "Add Title"]) }}
<div class="form-group ">
    <div id="edit-slug-box" class="{{ $page->slug ? '' : 'hidden' }} col-md-12">
    <label class="control-label required" for="current-slug">Permalink:</label>
    <span id="sample-page-permalink" class="d-inline-block">
    <a class="permalink" target="_blank" href="#">
    <span class="default-slug">/<span id="editable-page-name">{{ $page->slug ?? ''}}</span></span>
    </a>
    </span>
    <span id="edit-slug-buttons">
    <button type="button" class="btn btn-secondary" id="change_page_slug">Edit</button>
    <button type="button" class="save btn btn-secondary" id="btn-ok">OK</button>
    <button type="button" class="cancel button-link">Cancel</button>
    </span>
    </div>
    <input type="hidden" id="current-page-slug" name="current-slug" value="{{ $page->slug ?? '' }}">
    <div data-url="{{ route('admin.pages.ajax.slug') }}" data-view="/" id="page_slug_id" data-id="{{ $page->id ?? 0 }}"></div>
</div>
{{ Form::wysiwyg('body', null, $errors, $page, ['labelCol' => 0]) }}
