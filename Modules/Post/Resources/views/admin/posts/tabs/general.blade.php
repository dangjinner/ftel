{{ Form::text('name', null, $errors, $post, ['labelCol' => 0, 'placeholder' => "Add Title"]) }}
<div class="form-group ">
    <div id="edit-slug-box" class="{{ $post->slug ? '' : 'hidden' }} col-md-12">
    <label class="control-label required" for="current-slug">Permalink:</label>
    <span id="sample-permalink" class="d-inline-block">
    <a class="permalink" target="_blank" href="#">
    <span class="default-slug">https://ftel.vn/<span id="editable-post-name">{{ $post->slug ?? ''}}</span></span>
    </a>
    </span>
    <span id="edit-slug-buttons">
    <button type="button" class="btn btn-secondary" id="change_slug">Edit</button>
    <button type="button" class="save btn btn-secondary" id="btn-ok">OK</button>
    <button type="button" class="cancel button-link">Cancel</button>
    </span>
    </div>
    <input type="hidden" id="current-slug" name="current-slug" value="{{ $post->slug ?? '' }}">
    <div data-url="{{ route('admin.posts.ajax.slug') }}" data-view="https://ftel.vn/" id="slug_id" data-id="{{ $post->id ?? 0 }}"></div>
</div>
{{ Form::wysiwyg('content', null, $errors, $post, ['labelCol' => 0]) }}
