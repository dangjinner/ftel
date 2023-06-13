<div class="row">
    <div class="col-md-8">
        {{ Form::select('home_switcher', trans('fpt::attributes.home_switcher'), $errors, $homes, $settings) }}
        {{ Form::text('translatable[fpt_welcome_text]', trans('fpt::attributes.fpt_welcome_text'), $errors, $settings) }}
        {{ Form::select('fpt_theme_color', trans('fpt::attributes.fpt_theme_color'), $errors, trans('fpt::themes'), $settings) }}
        <div class="{{ old('fpt_theme_color', array_get($settings, 'fpt_theme_color')) === 'custom_color' ? '' : 'hide' }}" id="custom-theme-color">
            {{ Form::color('fpt_custom_theme_color', trans('fpt::attributes.fpt_custom_theme_color'), $errors, $settings) }}
        </div>

        {{ Form::select('fpt_mail_theme_color', trans('fpt::attributes.fpt_mail_theme_color'), $errors, trans('fpt::themes'), $settings) }}

        <div class="{{ old('fpt_mail_theme_color', array_get($settings, 'fpt_mail_theme_color')) === 'custom_color' ? '' : 'hide' }}" id="custom-mail-theme-color">
            {{ Form::color('fpt_custom_mail_theme_color', trans('fpt::attributes.fpt_custom_mail_theme_color'), $errors, $settings) }}
        </div>

        {{ Form::select('fpt_slider', trans('fpt::attributes.fpt_slider'), $errors, $sliders, $settings) }}
        {{ Form::select('fpt_terms_page', trans('fpt::attributes.fpt_terms_page'), $errors, $pages, $settings) }}
        {{ Form::select('fpt_privacy_page', trans('fpt::attributes.fpt_privacy_page'), $errors, $pages, $settings) }}
        {{ Form::text('translatable[fpt_address]', trans('fpt::attributes.fpt_address'), $errors, $settings) }}
           {{ Form::text('fpt_hotline', 'Hotline', $errors, $settings) }}
        {{ Form::text('fpt_zalo', 'Zalo', $errors, $settings) }}
    </div>
</div>
