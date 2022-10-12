<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('fpt_features_section_enabled', trans('fpt::attributes.section_status'), trans('fpt::fpt.form.enable_features_section'), $errors, $settings) }}

        <div class="clearfix"></div>

        <div class="box-content">
            <h4 class="section-title">{{ trans('fpt::fpt.form.feature_1') }}</h4>

            {{ Form::text('translatable[fpt_feature_1_title]', trans('fpt::attributes.title'), $errors, $settings) }}
            {{ Form::text('translatable[fpt_feature_1_subtitle]', trans('fpt::attributes.subtitle'), $errors, $settings) }}
            {{ Form::text('fpt_feature_1_icon', trans('fpt::attributes.icon'), $errors, $settings) }}
        </div>

        <div class="box-content">
            <h4 class="section-title">{{ trans('fpt::fpt.form.feature_2') }}</h4>

            {{ Form::text('translatable[fpt_feature_2_title]', trans('fpt::attributes.title'), $errors, $settings) }}
            {{ Form::text('translatable[fpt_feature_2_subtitle]', trans('fpt::attributes.subtitle'), $errors, $settings) }}
            {{ Form::text('fpt_feature_2_icon', trans('fpt::attributes.icon'), $errors, $settings) }}
        </div>

        <div class="box-content">
            <h4 class="section-title">{{ trans('fpt::fpt.form.feature_3') }}</h4>

            {{ Form::text('translatable[fpt_feature_3_title]', trans('fpt::attributes.title'), $errors, $settings) }}
            {{ Form::text('translatable[fpt_feature_3_subtitle]', trans('fpt::attributes.subtitle'), $errors, $settings) }}
            {{ Form::text('fpt_feature_3_icon', trans('fpt::attributes.icon'), $errors, $settings) }}
        </div>

        <div class="box-content">
            <h4 class="section-title">{{ trans('fpt::fpt.form.feature_4') }}</h4>

            {{ Form::text('translatable[fpt_feature_4_title]', trans('fpt::attributes.title'), $errors, $settings) }}
            {{ Form::text('translatable[fpt_feature_4_subtitle]', trans('fpt::attributes.subtitle'), $errors, $settings) }}
            {{ Form::text('fpt_feature_4_icon', trans('fpt::attributes.icon'), $errors, $settings) }}
        </div>

        <div class="box-content">
            <h4 class="section-title">{{ trans('fpt::fpt.form.feature_5') }}</h4>

            {{ Form::text('translatable[fpt_feature_5_title]', trans('fpt::attributes.title'), $errors, $settings) }}
            {{ Form::text('translatable[fpt_feature_5_subtitle]', trans('fpt::attributes.subtitle'), $errors, $settings) }}
            {{ Form::text('fpt_feature_5_icon', trans('fpt::attributes.icon'), $errors, $settings) }}
        </div>
    </div>
</div>
