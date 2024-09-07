$(document).ready(function() {
    const wmtChatBox = $('#wmt-chat-box');
    const wmtChatContactForm = $("#wmtChatContactForm");
    const supportOptions = $('.wmt-chat-options');
    const wmtChatForm = $('.wmt-chat-form');
    const techSupportContent  =$('#wmt-chat-tech-support');
    const chatNotice = $('.wmt-chat-notification');
    const wmtChatStartForm = $('#wmtChatStartForm');

    function sendChatNotice(message, type) {
        chatNotice.show();
        if(type === 'success') {
            chatNotice.addClass('wmt-chat-notice-success');
        }else {
            chatNotice.addClass('wmt-chat-notice-error');
        }
        chatNotice.html(message);
    }

    $('#chatBoxIcon').click(function(e) {
        e.preventDefault();
        $('#wmt-chat-box').show();
    });

    $('.wmt-chat-dropdown-icon').click(function(e) {
        e.preventDefault();
        wmtChatBox.hide();
    })

    $('#wmtChatServiceSupport').click(function(e) {
        e.preventDefault();
        wmtChatForm.show();
        supportOptions.hide();
        $('select[name=wmt_chat_option]').val(2);
    });

    $('#wmtChatTechSupport').click(function(e) {
        e.preventDefault();
        wmtChatForm.show();
        wmtChatContactForm.hide();
        techSupportContent.show();
        supportOptions.hide();
        $('select[name=wmt_chat_option]').val(1);
    });

    $('select[name=wmt_chat_option]').change(function() {
        const value = $(this).val();
        if(value == 1) {
            techSupportContent.show();
            wmtChatContactForm.hide();
            $('.wmt-chat-pre-content').show();
            $('.wmt-chat-register-info').hide();
        }else {
            techSupportContent.hide();
            wmtChatContactForm.show();
            $('.wmt-chat-pre-content').hide();
            $('.wmt-chat-register-info').show();
        }
    });

    function resetForm() {
        $('input[name=chat_customer_name]').val('');
        $('input[name=chat_customer_phone]').val('');
        $('textarea[name=chat_customer_address]').val('');
    }

    wmtChatContactForm.validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        submitHandler: function (form) {

            $.ajax({
                type: "POST",
                url: `/chat/register-service`,
                data: {
                    "_token": $('input[name=chat_csrf_token]').val(),
                    chat_customer_name: $('input[name=chat_customer_name]').val(),
                    chat_customer_phone: $('input[name=chat_customer_phone]').val(),
                    chat_customer_address: $('textarea[name=chat_customer_address]').val(),
                    chat_service_option: $('select[name=chat_service_option]').val(),
                    chat_customer_note: $('textarea[name=chat_customer_note]').val(),
                    chat_current_url: $('input[name=chat_current_url]').val(),
                },
                success: function (res) {
                    window.location.replace('/thank-you')
                    // resetForm();
                    // Swal.fire({
                    //     title: 'Gửi yêu cầu hỗ trợ thành công',
                    //     text: 'Chúng tôi sẽ liên hệ với bạn sớm nhất có thể',
                    //     icon: 'success',
                    //     confirmButtonText: 'Xong'
                    // })
                },
                error: function (err) {
                    Swal.fire({
                        title: 'Gửi yêu cầu hỗ trợ thất bại',
                        text: 'Vui lòng thử lại sau',
                        icon: 'error',
                        confirmButtonText: 'Xong'
                    })
                }
            });
        },
        rules: {
            "chat_customer_name": {
                required: true,
                minlength: 3
            },
            "chat_customer_phone": {
                required: false,
                regexPhone: true,
            },
            "chat_customer_address": {
                required: true,
            },
            "chat_service_option": {
                required: true
            }
        },
        messages: {
            "chat_customer_name": {
                required: "Vui lòng nhập họ và tên",
                minlength: 'Họ và tên phải có ít nhất 3 ký tự'
            },
            "chat_customer_phone": {
                required: 'Vui lòng nhập SĐT',
                regexPhone: 'Số điện thoại không đúng định dạng'
            },
            "chat_customer_address": {
                required: "Vui lòng nhập địa chỉ lắp đặt",
            },
            "chat_service_option": {
                required: "Vui lòng chọn dịch vụ bạn quan tâm"
            }
        }
    });

    wmtChatStartForm.submit(function(e) {
        e.preventDefault();
    }).validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,

        submitHandler: function (form) {
            const option = $('select[name=wmt_chat_start_option]');
            $('.wmt-chat-welcome-box').hide();
            wmtChatForm.show();

            if(option.val() == 1) {
                techSupportContent.show();
                wmtChatContactForm.hide();
                $('select[name=wmt_chat_option]').val(1);
                $('.wmt-chat-pre-content').show();
                $('.wmt-chat-register-info').hide();
            }else {
                techSupportContent.hide();
                wmtChatContactForm.show();
                $('select[name=wmt_chat_option]').val(2);
                $('.wmt-chat-pre-content').hide();
                $('.wmt-chat-register-info').show();

            }
        },
        rules: {
            "wmt_chat_start_option": {
                required: true,
            },

        },
        messages: {
            "wmt_chat_start_option": {
                required: "Vui lòng chọn dịch vụ",
            },
        }
    });
})
