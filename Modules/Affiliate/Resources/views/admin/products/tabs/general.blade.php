<div class="row">
    <div class="col-md-12">
        {{ Form::text('name', trans('affiliate::products.attributes.name'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('type', trans('affiliate::products.attributes.type'), $errors, trans('affiliate::products.form.types'), $affiliateProduct, ['labelCol' => 2]) }}
        <div id="page_url_form" style="display: none">
            {{ Form::text('page_url', trans('affiliate::products.attributes.page_url'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        </div>
        {{ Form::wysiwyg('description', trans('affiliate::products.attributes.description'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::wysiwyg('info', trans('affiliate::products.attributes.info'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::checkbox('is_set_cookie', trans('affiliate::products.attributes.is_set_cookie'), trans('affiliate::products.form.enable_set_cookie'), $errors, $affiliateProduct, ['labelCol' => 2]) }}

        <div id="cookie_duration_form" style="@if(!$affiliateProduct->is_set_cookie) display: none @endif">
            {{ Form::text('cookie_duration', trans('affiliate::products.attributes.cookie_duration'), $errors, $affiliateProduct, ['labelCol' => 2, 'required' => false]) }}
        </div>

        {{ Form::checkbox('status', trans('affiliate::products.attributes.status'), trans('affiliate::products.form.enable_the_product'), $errors, $affiliateProduct, ['labelCol' => 2]) }}
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            const formPageUrl = $('#page_url_form');
            const cookieDurationForm = $('#cookie_duration_form');

            $('select[name=type]').change(function (e) {
                console.log($(this).val())
                if ($(this).val() == 2) {
                    formPageUrl.show();
                } else {
                    formPageUrl.hide();
                }
            });

            $('#is_set_cookie').change(function () {
                if ($(this).is(':checked')) {
                    cookieDurationForm.show();
                } else {
                    cookieDurationForm.hide();
                }
            })
        })
    </script>
@endpush
