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
                                <option value="">-- Choose shortcode --</option>
                                <option value="[contact_form_custom]">Contact Form</option>
                                <option value="[camera_prices]">Camera Prices</option>
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
    let shortCodeSelected = '';
    $("#select-province").hide();
    $("#select-shortcode").change(function(e) {
        const value = $(this).val();
        shortCodeSelected = value;
        if(value === '[camera_prices]') {
            $("input[name=render_shortcode]").val(`[camera_prices]`);
        }

        if(value == "[contact_form_custom]") {
            $("input[name=render_shortcode]").val(`[contact_form_custom]`);
        }

        if(value === '') {
            $("input[name=render_shortcode]").val(``);
        }

        $("#copyText").html("Copy");
    });

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