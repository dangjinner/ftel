{{-- Đăng ký online --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.section1.register_online") }}</h5>
                </div>

                <div class="panel-body">
                    @hasAccess('admin.media.index')
                    <div class="panel-image">
                        @if (is_null($banner->image->path))
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <img class="hide">
                        @else
                        <img src="{{ $banner->image->path }}" alt="Banner">
                        @endif

                        <input type="hidden" name="translatable[fpt_banner_register_online_file_id]" value="{{ $banner->image->id }}"
                            class="banner-file-id">
                    </div>
                    @endHasAccess

                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_register_online-feature_desc">{{ trans("fpt::fpt.tabs.section1.section_name") }}</label>
                                    <input type="text" name="fpt_banner_register_online_feature_desc" value="{{ $banner->feature_desc }}"
                                        class="form-control" id="fpt_banner_register_online-feature_desc">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_register_online-call-to-action-url">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="fpt_banner_register_online_call_to_action_url"
                                        value="{{ $banner->call_to_action_url }}" class="form-control"
                                        id="fpt_banner_register_online-call-to-action-url">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- hotline --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.section1.hotline") }}</h5>
                </div>

                <div class="panel-body">
                    @hasAccess('admin.media.index')
                    <div class="panel-image">
                        @if (is_null($banner_hotline->image->path))
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <img class="hide">
                        @else
                        <img src="{{ $banner_hotline->image->path }}" alt="Banner">
                        @endif

                        <input type="hidden" name="translatable[fpt_banner_hotline_file_id]"
                            value="{{ $banner_hotline->image->id }}" class="banner-file-id">
                    </div>
                    @endHasAccess

                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_hotline-feature_desc">{{ trans("fpt::fpt.tabs.section1.section_name") }}</label>
                                    <input type="text" name="fpt_banner_hotline_feature_desc"
                                        value="{{ $banner_hotline->feature_desc }}" class="form-control"
                                        id="fpt_banner_hotline-feature_desc">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_hotline-call-to-action-url">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="fpt_banner_hotline_call_to_action_url"
                                        value="{{ $banner_hotline->call_to_action_url }}" class="form-control"
                                        id="fpt_banner_hotline-call-to-action-url">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Location --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.section1.location") }}</h5>
                </div>

                <div class="panel-body">
                    @hasAccess('admin.media.index')
                    <div class="panel-image">
                        @if (is_null($banner_location->image->path))
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <img class="hide">
                        @else
                        <img src="{{ $banner_location->image->path }}" alt="Banner">
                        @endif

                        <input type="hidden" name="translatable[fpt_banner_location_file_id]"
                            value="{{ $banner_location->image->id }}" class="banner-file-id">
                    </div>
                    @endHasAccess

                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_location-feature_desc">{{ trans("fpt::fpt.tabs.section1.section_name") }}</label>
                                    <input type="text" name="fpt_banner_location_feature_desc"
                                        value="{{ $banner_location->feature_desc }}" class="form-control"
                                        id="fpt_banner_location-feature_desc">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="fpt_banner_location-call-to-action-url">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="fpt_banner_location_call_to_action_url"
                                        value="{{ $banner_location->call_to_action_url }}" class="form-control"
                                        id="fpt_banner_location-call-to-action-url">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
