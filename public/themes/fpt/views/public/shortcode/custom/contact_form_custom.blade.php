<form action="{{ route('home.kh.dangkydichvu') }}" method="post" id="registerFormCustom" class="form-dk-post">
    @csrf
    <p class="title-header">ĐĂNG KÝ ONLINE - NHẬN NGAY ƯU ĐÃI</p>
    <span class="note">Chúng tôi sẽ liên hệ với Bạn sau 5 phút đăng ký</span>
    <div class="sex">
        <input type="radio" name="sex" id="male" checked value="male" {{ old('sex')=="male" ? 'checked' : '' }}>
        <label for="male"> Anh</label>
        <input type="radio" name="sex" id="female" value="female" {{ old('sex')=="female" ? 'checked' : '' }}>
        <label for="female"> Chị</label>
    </div>
    <div class="row form__content">
        <div class="col-lg-6 col-md-6 col-12  form-name">
            <input class="name form-control" type="text" name="name" value="{{ old('name') }}"
                placeholder="Nhập họ và tên *">
            @if (isset($errors) && $errors->first('name'))
            <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-12  form-phone">
            <input class="phone form-control" type="number" name="phone" value="{{ old('phone') }}"
                placeholder="Nhập số điện thoại *">
            @if (isset($errors) && $errors->first('phone'))
            <span class="help-block text-danger">{!! $errors->first('phone') !!}</span>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-12  form-address">
            <input class="address form-control" type="text" name="address" value="{{ old('address') }}"
                placeholder="Nhập địa chỉ *">
            @if (isset($errors) && $errors->first('address'))
            <span class="help-block text-danger">{!! $errors->first('address') !!}</span>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-12  form-email">
            <select name="options_service" id="options_service" class="form-control">
                <option value="">Vui lòng lựa chọn dịch vụ *</option>
                <option value="Internet FPT" {{ old('options_service')=="Internet FPT" ? 'selected' : '' }}>
                    Internet FPT</option>
                <option value="Truyền hình FPT" {{ old('options_service')=="Truyền hình FPT" ? 'selected' : '' }}>
                    Truyền hình FPT </option>
                <option value="Combo Internet + Truyền hình FPT"
                    {{ old('options_service')=="Combo Internet + Truyền hình FPT" ? 'selected' : '' }}>Combo Internet + Truyền hình FPT
                </option>
                <option value="FPT Camera" {{ old('options_service')=="FPT Camera" ? 'selected' : '' }}>FPT
                    Camera</option>
                <option value="Combo Internet + Camera"
                    {{ old('options_service')=="Combo Internet + Camera" ? 'selected' : '' }}>Combo Internet + Camera</option>
                <option value="FPT Play Box" {{ old('options_service')=="FPT Play Box" ? 'selected' : '' }}>FPT
                    Play Box</option>
                <option value="FPT iHome" {{ old('options_service')=="FPT iHome" ? 'selected' : '' }}>FPT iHome
                </option>
                <option value="Dịch vụ khác" {{ old('options_service')=="Dịch vụ khác" ? 'selected' : '' }}>Dịch vụ
                    khác</option>
            </select>
            @if (isset($errors) && $errors->first('options_service'))
            <span class="help-block text-danger">{!! $errors->first('options_service') !!}</span>
            @endif
        </div>
        {{-- <input class="email" type="Email" name="email" value="" placeholder="Nhập Email "> --}}
        <div class=" col-lg-12 col-md-12 col-12 form_messages">
            <textarea class="form-control" rows="5" name="comment" value="{{ old('comment') }}"
                placeholder="Thông điệp nhắn gửi"></textarea>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <p>(*) Vui lòng điền đầy đủ các thông tin này</p>
        </div>
        <div class=" col-lg-12 col-md-12 col-12 form_submit">
            <input type="hidden" name="email_received"  value="{{ $configData->email_receive ?? "" }} ">
            <input type="hidden" name="google_sheet_name" value="{{ $configData->google_sheet_name ?? "" }} ">
            <input type="hidden" name="google_sheet_key"  value="{{ $configData->google_sheet_key ?? "" }} ">
            <input type="hidden" name="google_sheet_link"  value=" {{ $configData->google_sheet_link ?? "" }} ">
            <input type="hidden" name="slug_page" value="{{ request()->path() }}" />
            <button type="submit" id="submitDk">Đăng ký</button>
        </div>
    </div>
</form>
<style>
    form.form-dk-post {
        width: 100%;
        padding: 10px;
    }

    form.form-dk-post p {
        padding-top: 1rem;
        font-size: 1rem;
        font-weight: 700;
    }

    form.form-dk-post .note {
        color: red;
        font-style: italic;
        font-size: .95rem;
        margin-bottom: 15px;
        display: block;
    }

    form.form-dk-post .sex {
        display: flex;
        align-items: center;
    }

    form.form-dk-post .sex input#male,
    form.form-dk-post .sex input#female {
        margin-right: 0.2rem;
        width: 1rem;
        height: 1rem;
    }

    form.form-dk-post .form__content {
        padding: 1rem 0rem 0rem 0rem;
    }

    form.form-dk-post .form__content div.col-lg-6 {
        margin-bottom: 1rem;
    }

    form.form-dk-post .form__content .form_submit input[type=submit] {
        width: auto;
        padding: 0.5rem 4rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: #fff;
        margin-top: 1rem;
        background-image: linear-gradient(to left, #3F8EFC, #2876E2);
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
     form.form-dk-post .form__content .form_submit .fa-spin-loading-form {
                background: none;
                color:#FFF;
                font-size:30px;
                margin-right: 1rem;
            }
    
    form.form-dk-post .form__content .form_submit button[type=submit]{
                width: auto;
                padding: 0.5rem 4rem;
                font-size: 1.2rem;
                font-weight: 700;
                color: #fff;
                margin-top: 1rem;
                background-image: linear-gradient(to left, #3F8EFC, #2876E2);
                border: 1px solid #ccc;
                border-radius: 5px;
                display: flex;
                justify-content: center;
                align-content: center;
            }

    form.form-dk-post .sex label {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0px;
        font-size: 14px;
        margin-right: 2rem;
        font-size: 1rem;
        font-weight: 600;
    }

    form.form-dk-post .sex input[type='radio']:checked+label {
        color: #0D56AB;
        font-weight: 600;
    }
    form.form-dk-post label.error,
    form.form-dk-post span.error{
        color: red;
        font-size: 0.9rem;
    }
</style>
<script>
    function submitContactForm() {
        window.grecaptcha.ready(function () {
            var $formContact = $('form[id="registerFormCustom"]');
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
    document.addEventListener("DOMContentLoaded", function(event) {
        submitContactForm();
        $.validator.addMethod("regexPhone",
            function(value, element) {
                return /(0[3|5|7|8|9])+([0-9]{8})\b/.test(value);
            },
            "Vui lòng nhập đúng SĐT"
        );
        $("#registerFormCustom").validate({
            rules: {
                sex: "required",
                name: {
                    required: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    regexPhone: true
                },
                address: {
                    required: true,
                },
                options_service: 'required'
            },
            messages: {
                sex: "Vui lòng chọn",
                name: {
                    required: "Vui lòng nhập tên",
                    minlength: "Tên tối thiểu 2 kí tự"
                },
                phone: {
                    required: "Vui lòng nhập SĐT",
                    minlength: "Vui lòng nhập đúng SĐT"
                },
                address: {
                    required: "Vui lòng nhập địa chỉ",
                },
                options_service: "Vui lòng chọn dịch vụ"
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "sex") {
                    error.insertAfter(element.closest('div'));
                }else{
                    error.insertAfter(element);
                }
            }
        });
        
         $('.form-dk-post').submit(function(e) {
                     e.preventDefault();
                    $('#submitDk').html('<i class="fa fa-refresh fa-spin fa-spin-loading-form"></i> Đang đăng ký');
                    $(this).unbind('submit').submit(); 
                });
    });
</script>
