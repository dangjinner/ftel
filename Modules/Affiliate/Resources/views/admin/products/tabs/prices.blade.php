{{ Form::text('price', trans('affiliate::products.attributes.price'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => false]) }}
{{ Form::select('commission_type', trans('affiliate::products.attributes.commission_type'), $errors, trans('affiliate::products.form.commission_types'), $affiliateProduct, ['labelCol' => 2]) }}
{{ Form::text('commission', trans('affiliate::products.attributes.commission'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => false]) }}
