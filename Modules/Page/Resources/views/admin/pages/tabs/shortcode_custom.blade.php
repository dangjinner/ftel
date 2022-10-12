<div id="get-shortcode" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-5">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#seo" aria-expanded="true"
                        class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-name" class="pull-left">Get Shortcode</span>
                    </a>
                </h4>
            </div>
            <div id="get-shortcode" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label text-left">
                            Choose Shortcode
                        </label>
                        <div class="col-md-9">
                            <select id="select-shortcode">
                                <option>-- Choose shortcode --</option>
                                <!--<option value="[fpt_play][/fpt_play]">FPT Play</option>-->
                                <option value="[go_pricing_custom]">Bảng giá dịch vụ</option>
                                <option value="[contact_form_custom]">Contact Form</option>
                                <option value="[camera_prices_custom]">Camera Prices</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="select-province" style="display: none">
                        <label class="col-md-3 control-label text-left">
                            Provinces
                        </label>
                        <div class="col-md-9">
                            <select name="tinh1" id="tinh1" class="select-province">
                                <option value="">-- Chọn khu vực --</option>
                                @foreach ($provinces as $key => $value)
                                    <option value="{{ $key }}"
                                    {{-- {{ request()->get('locationId') ? '' : ($key == $shortcode->provinces_id ? 'selected' : '') }} --}}
                                        {{ request()->get('locationId') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="select-category" style="display: none">
                        <label class="col-md-3 control-label text-left">
                            Category
                        </label>
                        <div class="col-md-9">
                            <select name="category" id="category" class="select-category">
                                <option value="">Select option</option>
                                <option value="5" class="category-item" data-box="Internet Cá nhân">Internet cá nhân</option>
                                <option value="6" class="category-item" data-box="Internet Doanh Nghiệp">Internet Doanh nghiệp</option>
                                <option value="7" class="category-item" data-box="Internet Truyền Hình">Combo Internet truyền hình</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label text-left">
                            Render Shortcode
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="render_shortcode" class="form-control" 
                                value="">
                        </div>
                        <div class="col-md-3" style="margin-top: 1rem">
                            <button id="copyText" class="btn btn-primary">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let isNeedProvince = false;
    let shortCodeSelected = '';
    let provinceSelected = '';
    let categorySelected = '';
    $("#select-province").hide();
    $("#select-shortcode").change(function(e) {
        const value = $(this).val();
        shortCodeSelected = value;
        if(value == "[fpt_play][/fpt_play]" || value == "[go_pricing_custom]") {
            isNeedProvince = true;
            $("#select-province").show('fast');
        }
        else {
             $("#select-province").hide('fast');
        }
        if(value == "[go_pricing_custom]") {
            $("#select-category").show('fast');
        }else {
            $("#select-category").hide('fast');
        }
        if(value == "[contact_form_custom]") {
            $("input[name=render_shortcode]").val(`[contact_form_custom]`);
        }

        if(value === '[camera_prices_custom]') {
            $("input[name=render_shortcode]").val(`[camera_prices_custom]`);
        }

        $("#copyText").html("Copy");
    });
    $(".select-province").change(function(e) {
        const value = $(this).val();
        switch(shortCodeSelected) {
            case "[fpt_play][/fpt_play]":
                $("input[name=render_shortcode]").val(`[fpt_play provinces_id=${value}][/fpt_play]`);
                break;
            case "[go_pricing_custom]":
                $("input[name=render_shortcode]").val(`[go_pricing_custom provinces_id="${value}" cat_id="${categorySelected}" ]`);
                provinceSelected = value;
                break;
        }
        $("#copyText").html("Copy");
        
    });
    $(".select-category").change(function(e) {
        const value = $(this).val();
        categorySelected = value;
        switch(shortCodeSelected) {
            case "[go_pricing_custom]":
                $("input[name=render_shortcode]").val(`[go_pricing_custom provinces_id="${provinceSelected}" cat_id="${value}" ]`);
                break;
        }
        $("#copyText").html("Copy");
    })

    $("#copyText").click(function(e) {
        e.preventDefault();
        let $temp = $("<input>");
        $("body").append($temp);
        $temp.val($("input[name=render_shortcode]").val()).select();
        document.execCommand("copy");
        $(this).html('Copied');
        $temp.remove();
    })
 
</script>
@endpush