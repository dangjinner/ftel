<div class="row">
    <div class="col-md-10">
        {{ Form::text('ip', trans('affiliate::customers.attributes.ip'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('utm_medium', trans('affiliate::customers.attributes.utm_medium'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('utm_source', trans('affiliate::customers.attributes.utm_source'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('utm_content', trans('affiliate::customers.attributes.utm_content'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('utm_campaign', trans('affiliate::customers.attributes.utm_campaign'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('utm_term', trans('affiliate::customers.attributes.utm_term'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('from_page_url', trans('affiliate::customers.attributes.from_page_url'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
    </div>
</div>
