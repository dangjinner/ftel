@include('media::admin.image_picker.single', [
    'title' => trans('page::pages.form.logo'),
    'inputName' => 'files[logo]',
    'file' => $page->logo,
])

<div class="media-picker-divider"></div>
