<div class="row">
    <div class="col-md-12">
        {{ Form::text('name', trans('affiliate::products.attributes.name'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::wysiwyg('description', trans('affiliate::products.attributes.description'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::wysiwyg('info', trans('affiliate::products.attributes.info'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::checkbox('status', trans('affiliate::products.attributes.status'), trans('affiliate::products.form.enable_the_product'), $errors, $affiliateProduct) }}
    </div>
</div>
