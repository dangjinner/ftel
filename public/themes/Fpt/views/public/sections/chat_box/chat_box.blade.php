<div id="wmt-chat-box" >
    <div class="wmt-chat-header" style="background: {{ setting('wmt_chat_bg_color') }}">
        <div class="wmt-chat-header-left">
            {!! setting('wmt_chat_title') !!}
        </div>
        <div class="wmt-chat-header-nav">
            <a href="#" class="wmt-chat-dropdown-icon">
                <svg height="35px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 6.25 6.25"
                     enable-background="new 0 0 50 50" xml:space="preserve" transform="rotate(90)"><path
                                                                                                         d="M1.945 5.104a0.125 0.125 0 0 0 0.177 0l1.875 -1.875a0.125 0.125 0 0 0 0 -0.177l-1.875 -1.875a0.125 0.125 0 1 0 -0.177 0.177l1.787 1.787 -1.787 1.787a0.125 0.125 0 0 0 0 0.177z"/></svg>
            </a>
        </div>
    </div>
    <div class="wmt-chat-body">
        <div class="wmt-chat-pre-content">
            {!! setting('wmt_chat_desc')  !!}
        </div>
        <div class="wmt-chat-register-info">
            {!! setting('wmt_chat_register_info')  !!}
        </div>
        <div class="wmt-chat-body">
            <div class="flex-column wmt-chat-welcome-box" style="gap: 25px; display: flex">
                <div class="wmt-chat-welcome-section">
                    {!! setting('wmt_chat_welcome_section') !!}
                </div>
                <form id="wmtChatStartForm" action="#" method="POST" class="justify-content-center align-items-center flex-column" style="display: flex">
                    <div class="form-group">
                        <select name="wmt_chat_start_option" class="form-control form-select">
                            <option value="">{{ setting('wmt_chat_default_option') }}</option>
                            <option value="2">{{ setting('wmt_chat_service_support_option')  }}</option>
                            <option value="1">{{ setting('wmt_chat_tech_support_option') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info wmt-btn-start" style="background: {{ setting('wmt_chat_button_bg_color') }}">
                        {{ setting('wmt_chat_submit_start_button_text') }}
                    </button>
                </form>

            </div>

            <div class="wmt-chat-form">
                <div class="form-group wmt-chat-select-options" style="border-color: {{ setting('wmt_chat_bg_color') }}">
                    <select name="wmt_chat_option" class="form-control form-select">
                        <option value="">{{ setting('wmt_chat_default_option') }}</option>
                        <option value="2">{{ setting('wmt_chat_service_support_option')  }}</option>
                        <option value="1">{{ setting('wmt_chat_tech_support_option') }}</option>
                    </select>
                </div>
                <div id="wmt-chat-tech-support">
                    {!!  setting('wmt_chat_tech_support_content') !!}
                </div>
                <form action="#" method="POST" id="wmtChatContactForm">
                    <input  type="hidden" name="chat_csrf_token" value="{{ csrf_token() }}"/>
                    <input  type="hidden" name="chat_current_url" value="{{ request()->getRequestUri() }}"/>
                    <div class="form-group">
                        <input class="form-control" type="text" name="chat_customer_name" placeholder="Họ và tên"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="chat_customer_phone" placeholder="Số điện thoại"/>
                    </div>
                    <div class="form-group">
                        <select name="chat_service_option" class="form-control">
                            <option value="">Vui lòng lựa chọn dịch vụ</option>
                            @foreach($registerServiceOptions as $option)
                                <option value="{{ $option }}">{{$option}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="1" name="chat_customer_address" placeholder="Địa chỉ lắp đặt"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="1" name="chat_customer_note" placeholder="Ghi chú"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary wmt-chat-btn-submit" style="background: {{ setting('wmt_chat_button_bg_color') }}">
                        {{ setting('wmt_chat_submit_button_text') }}
                    </button>
                </form>
                <div class="wmt-chat-notification">
                </div>
            </div>
        </div>
    </div>
</div>
