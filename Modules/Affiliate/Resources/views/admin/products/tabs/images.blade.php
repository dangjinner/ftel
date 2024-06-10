
@include('media::admin.image_picker.single', [
    'title' => trans('affiliate::products.form.base_image'),
    'inputName' => 'files[base_image]',
    'file' => $affiliateProduct->base_image,
])

