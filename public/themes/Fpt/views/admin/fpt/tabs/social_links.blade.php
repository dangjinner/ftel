<div class="row">
    <div class="col-md-8">
        {{ Form::text('fpt_facebook_link', trans('fpt::attributes.fpt_facebook_link'), $errors, $settings) }}
        {{ Form::text('fpt_twitter_link', trans('fpt::attributes.fpt_twitter_link'), $errors, $settings) }}
        {{ Form::text('fpt_instagram_link', trans('fpt::attributes.fpt_instagram_link'), $errors, $settings) }}
        {{ Form::text('fpt_youtube_link', trans('fpt::attributes.fpt_youtube_link'), $errors, $settings) }}
    </div>
</div>
