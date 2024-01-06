<div id="options-group" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-0">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#rating"
                        class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-name" class="pull-left">Rating</span>
                    </a>
                </h4>
            </div>

            <div id="rating" class="panel-collapse collapse in"  style="">
                <div class="panel-body">
                    {{ Form::checkbox('is_default_rating', trans('post::attributes.is_default_rating'), 'Enable', $errors, $post) }}
                    {{ Form::text('custom_avg_rating', trans('post::attributes.custom_avg_rating'), $errors, $post, ['required' => true]) }}
                    {{ Form::text('custom_rating_count', trans('post::attributes.custom_rating_count'), $errors, $post, ['required' => true]) }}
                </div>
            </div>
        </div>
    </div>
</div>
