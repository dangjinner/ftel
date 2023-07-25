{{-- Hi FPT --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.hifpt") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_hifpt_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="translatable[fpt_setting_hifpt_support_url]"
                                        value="{{ $settings['fpt_setting_hifpt_support_url'] ?? '' }}" class="form-control"
                                        id="translatable[fpt_setting_hifpt_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_hifpt_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_hifpt_support_text]"
                                           value="{{ $settings['fpt_setting_hifpt_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_hifpt_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Hotline bán hàng  --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.hotline_sale") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_hotline_sale_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                        <input type="text" name="translatable[fpt_setting_hotline_sale_support_url]"
                                        value="{{ $settings['fpt_setting_hotline_sale_support_url'] ?? '' }}" class="form-control"
                                        id="translatable[fpt_setting_hotline_sale_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_hotline_sale_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_hotline_sale_support_text]"
                                           value="{{ $settings['fpt_setting_hotline_sale_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_hotline_sale_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Hotline kỹ thuật  --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.hotline_tech") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                    for="translatable[fpt_setting_hotline_sale_tech_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="translatable[fpt_setting_hotline_sale_tech_support_url]"
                                    value="{{ $settings['fpt_setting_hotline_sale_tech_support_url'] ?? '' }}" class="form-control"
                                    id="translatable[fpt_setting_hotline_sale_tech_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_hotline_sale_tech_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_hotline_sale_tech_support_text]"
                                           value="{{ $settings['fpt_setting_hotline_sale_tech_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_hotline_sale_tech_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Email  --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.email") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                    for="translatable[fpt_setting_email_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="translatable[fpt_setting_email_support_url]"
                                    value="{{ $settings['fpt_setting_email_support_url'] ?? '' }}" class="form-control"
                                    id="translatable[fpt_setting_email_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_email_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_email_support_text]"
                                           value="{{ $settings['fpt_setting_email_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_email_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Live Chat  --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.live_chat") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                    for="translatable[fpt_setting_live_chat_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="translatable[fpt_setting_live_chat_support_url]"
                                    value="{{ $settings['fpt_setting_live_chat_support_url'] ?? '' }}" class="form-control"
                                    id="translatable[fpt_setting_live_chat_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_live_chat_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_live_chat_support_text]"
                                           value="{{ $settings['fpt_setting_live_chat_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_live_chat_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Facebook  --}}
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <div class="panel">
                <div class="panel-header">
                    <h5>{{ trans("fpt::fpt.tabs.support.diadiemgiaodich.fb") }}</h5>
                </div>

                <div class="panel-body">
                    <div class="panel-content clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                    for="translatable[fpt_setting_fb_support_url]">{{ trans("fpt::fpt.tabs.section1.section_url") }}</label>
                                    <input type="text" name="translatable[fpt_setting_fb_support_url]"
                                    value="{{ $settings['fpt_setting_fb_support_url'] ?? '' }}" class="form-control"
                                    id="translatable[fpt_setting_fb_support_url]">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-6 clearfix">
                                <div class="form-group">
                                    <label
                                        for="translatable[fpt_setting_fb_support_text]">Text</label>
                                    <input type="text" name="translatable[fpt_setting_fb_support_text]"
                                           value="{{ $settings['fpt_setting_fb_support_text'] ?? '' }}" class="form-control"
                                           id="translatable[fpt_setting_fb_support_text]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
