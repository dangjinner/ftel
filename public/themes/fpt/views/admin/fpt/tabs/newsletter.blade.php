@include('media::admin.image_picker.single', [
    'title' => trans('fpt::fpt.form.newsletter_bg_image'),
    'inputName' => 'fpt_newsletter_bg_image',
    'file' => $newsletterBgImage,
])
