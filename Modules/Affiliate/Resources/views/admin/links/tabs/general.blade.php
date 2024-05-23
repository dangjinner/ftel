<div class="row">
    <div class="col-md-10">
        {{ Form::text('utm_source', trans('affiliate::links.attributes.utm_source'), $errors, $affiliateLink, ['labelCol' => 2, 'required' => false]) }}
        {{ Form::text('utm_campaign', trans('affiliate::links.attributes.utm_campaign'), $errors, $affiliateLink, ['labelCol' => 2, 'required' => false]) }}
        {{ Form::text('utm_content', trans('affiliate::links.attributes.utm_content'), $errors, $affiliateLink, ['labelCol' => 2, 'required' => false]) }}
        {{ Form::text('utm_medium', trans('affiliate::links.attributes.utm_medium'), $errors, $affiliateLink, ['labelCol' => 2, 'required' => false]) }}
        {{ Form::checkbox('status', trans('affiliate::links.attributes.status'), trans('affiliate::links.form.enable_the_link'), $errors, $affiliateLink) }}
    </div>
</div>
