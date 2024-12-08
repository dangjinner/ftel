<div class="row">
    <div class="col-md-10">
        {{ Form::text('last_name', trans('affiliate::accounts.attributes.last_name'), $errors, $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('first_name', trans('affiliate::accounts.attributes.first_name'), $errors, $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('email', trans('affiliate::accounts.attributes.email'), $errors, $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('phone_number', trans('affiliate::accounts.attributes.phone_number'), $errors, $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('address', trans('affiliate::accounts.attributes.address'), $errors, $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('type', trans('affiliate::accounts.attributes.type'), $errors, trans('affiliate::accounts.form.types'), $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('status', trans('affiliate::accounts.attributes.status'), $errors, trans('affiliate::accounts.form.statuses'), $affiliateAccount, ['labelCol' => 2, 'required' => true]) }}
    </div>
</div>
