<div class="row">
    <div class="col-md-10">
        {{ Form::text('name', trans('affiliate::customers.attributes.name'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('phone_number', trans('affiliate::customers.attributes.phone_number'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('address', trans('affiliate::customers.attributes.address'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('service_option', trans('affiliate::customers.attributes.service_option'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('note', trans('affiliate::customers.attributes.note'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('status', trans('affiliate::customers.attributes.status'), $errors, trans('affiliate::customers.form.status'), $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
    </div>
</div>
