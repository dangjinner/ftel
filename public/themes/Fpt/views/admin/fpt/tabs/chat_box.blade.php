<div class="row">
    {{ Form::text('wmt_chat_icon_text', 'Chat Icon Text ', $errors, $settings) }}

    <div class="form-group">
        <label for="wmt_chat_icon_bg_color" class="col-md-3 control-label text-left">Màu nền biểu tượng chat</label>
        <div class="col-md-9">
            <input name="wmt_chat_icon_bg_color" class="form-control " id="wmt_chat_icon_bg_color"
                   value="{{ setting('wmt_chat_icon_bg_color') }}" type="color">
        </div>
    </div>

    <div class="form-group">
        <label for="wmt_chat_bg_color" class="col-md-3 control-label text-left">Màu nền chat box</label>
        <div class="col-md-9">
            <input name="wmt_chat_bg_color" class="form-control " id="wmt_chat_bg_color"
                   value="{{ setting('wmt_chat_bg_color') }}" type="color">
        </div>
    </div>

    <div class="form-group">
        <label for="wmt_chat_button_bg_color" class="col-md-3 control-label text-left">Màu nền của button</label>
        <div class="col-md-9">
            <input name="wmt_chat_button_bg_color" class="form-control " id="wmt_chat_button_bg_color"
                   value="{{ setting('wmt_chat_button_bg_color') }}" type="color">
        </div>
    </div>


    {{ Form::wysiwyg('wmt_chat_title', 'Tiêu đề', $errors, $settings) }}
    {{ Form::wysiwyg('wmt_chat_welcome_section', 'Welcome Text', $errors, $settings) }}

    {{ Form::wysiwyg('wmt_chat_desc', 'Thông tin hỗ trợ kỹ thuật', $errors, $settings) }}
    {{ Form::wysiwyg('wmt_chat_register_info', 'Thông tin hỗ trợ đăng ký', $errors, $settings) }}

    {{ Form::text('wmt_chat_default_option', 'Mặc định', $errors, $settings) }}
    {{ Form::text('wmt_chat_tech_support_option', 'Option Hỗ trợ kỹ thuật', $errors, $settings) }}
    {{ Form::text('wmt_chat_service_support_option', 'Option Hỗ trợ dịch vụ', $errors, $settings) }}
    {{ Form::text('wmt_chat_submit_button_text', 'Nút submit', $errors, $settings) }}
    {{ Form::text('wmt_chat_submit_start_button_text', 'Nút start', $errors, $settings) }}

    {{ Form::wysiwyg('wmt_chat_tech_support_content', 'Nội dung hỗ trợ kỹ thuật', $errors, $settings) }}

</div>
