@for ($i = 1; $i <= 10; $i++) <?php
        $banner = 'banner' . $i;
    ?> <div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('admin.fpt.tabs.partials.single_banner_featured', [
            'label' => trans('fpt::fpt.form.capquang_canhan'),
            'name' => 'fpt_service_banner_'.$tab_name.$i,
            'banner' => $$banner,
            'i' => $i
            ])
        </div>
    </div>
    </div>
@endfor

<div class="panel">
    <div class="panel-header">
        <h5>{{ trans('fpt::fpt.form.table_desc') }} </h5>
    </div>

    <div class="panel-body">
        <div class="panel-content clearfix">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                    <div class="form-group">
                        <textarea name="fpt_service_banner_table_content_fpt_play_box_feature_desc" class="form-control wysiwyg"
                            id="fpt_service_banner_table_content_fpt_play_box-feature_desc">{{ $table_desc->feature_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('admin.fpt.tabs.partials.banner_giathietbi', [
            'label' => trans('fpt::fpt.form.fptplayboxgiathietbi'),
            'name' => 'fpt_service_banner_fptplayboxgiathietbi',
            'banner_giathietbi' => $banner_giathietbi
            ])
        </div>
    </div>
</div>
