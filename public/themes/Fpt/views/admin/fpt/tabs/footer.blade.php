<div class="row">
    <div class="col-md-8">
        {{ Form::select('fpt_footer_tags', trans('fpt::attributes.fpt_footer_tags'), $errors, $tags, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{ Form::text('translatable[fpt_copyright_text]', trans('fpt::attributes.fpt_copyright_text'), $errors, $settings) }}
    </div>
</div>

@include('media::admin.image_picker.single', [
    'title' => trans('fpt::fpt.form.accepted_payment_methods_image'),
    'inputName' => 'fpt_accepted_payment_methods_image',
    'file' => $acceptedPaymentMethodsImage,
])


