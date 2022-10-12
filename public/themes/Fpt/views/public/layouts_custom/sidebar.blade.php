<div id="text-20" class="widget widget_text">
    <div class="widget-top">
        <h4>Tổng Đài Tư Vấn Toàn Quốc</h4>
        <div class="stripe-line"></div>
    </div>
    <div class="widget-container">
        <div class="textwidget">
            <h2 style="text-align: left;"><span style="color: #008000;"><strong><span style="color: #008000;"> Hotline:
                            <a style="color: #008000;" href="tel:0978888659">0978888659</a></span> </strong></span>
            </h2>
        </div>
    </div>
</div>

<div id="text-31" class="widget widget_text">
    <div class="widget-top">
        <h4>Tổng Đài Tư Vấn TP.HCM</h4>
        <div class="stripe-line"></div>
    </div>
    <div class="widget-container">
        <div class="textwidget">
            <h2 style="text-align: left;"><span style="color: #0000ff;"><strong>Hotline: <a
                            href="tel:0978888659">0978888659</a></strong></span></h2>
            <h2 style="text-align: left;"><span style="color: #ff0000;"><strong>&nbsp;</strong></span></h2>
        </div>
    </div>
</div>

<div id="text-27" class="widget widget_text">
    <div class="widget-top">
        <h4>Đăng ký trực tuyến</h4>
        <div class="stripe-line"></div>
    </div>
    <div class="widget-container">
        <div class="textwidget">
            <div role="form" class="wpcf7" id="wpcf7-f17635-o1" lang="en-US" dir="ltr">
                <form action="{{ route('pages.contact.store') }}" method="post" id="frm-contact">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('common.contact.name') }}</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" id="name"
                                placeholder="{{ __('common.contact.placeholder_name') }}" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('common.contact.email') }}</label>
                            <input name="email" type="email" class="form-control" value="{{ old('email') }}" id="email"
                                placeholder="{{ __('common.contact.placeholder_email') }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('common.contact.content') }}</label>
                        <textarea name="content" class="form-control" id="content" rows="3" minlength="20" maxlength="300"
                            placeholder="{{ __('common.contact.placeholder_content') }}" required>{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('common.contact.send') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        function submitContactForm() {
            window.grecaptcha.ready(function () {
                var $formContact = $('form[id="frm-contact"]');
                if ($formContact.length) {
                    $formContact.submit(function (e) {
                        e.preventDefault();
                        var action = 'contact/submit';
                        window.grecaptcha.execute("{{ config('services.google_recaptcha.key') }}", {action: action}).then(function (token) {
                            var $recaptchaAction = $('#recaptcha_action');
                            var $recaptchaToken = $('#recaptcha_token');
                            if ($recaptchaAction.length) {
                                $recaptchaAction.val(action);
                            } else {
                                $formContact.append('<input type="hidden" name="recaptcha_action" id="recaptcha_action" value="' + action + '" />');
                            }
                            if ($recaptchaToken.length) {
                                $recaptchaToken.val(token);
                            } else {
                                $formContact.append('<input type="hidden" name="recaptcha_token" id="recaptcha_token" value="' + token + '" />');
                            }
                            $formContact.unbind('submit').submit();
                        });
                    });
                } // End if
            })
        }
        $(document).ready(function () {
            submitContactForm();
        });
    </script>
@endsection
