import tinyMCE from 'tinymce';

tinyMCE.baseURL = `${FleetCart.baseUrl}/modules/admin/js/wysiwyg`;

var data = [];
var listProvince = null;
var getProvince = function () {
    $.ajax({
        async: false,
        type: "GET",
        url: route('pages.provinces'),
        datatype: 'json',
        success: function (data) {
            listProvince = data;
        }
    });
}
getProvince();
for (const [key, value] of Object.entries(listProvince)) {
    var json = `{"value":"${key}-${value}", "text":"${value}"}`;
    var item = JSON.parse(json);
    data.push(item);
}
var dialogConfigBox = {
    title: 'Box',
    body: {
        type: 'panel',
        items: [
            {
                type: 'selectbox', // component type
                name: 'type', // identifier
                label: 'Style',
                size: 1, // number of visible values (optional)
                items: [
                    { value: 'shadow', text: 'Shadow' },
                    { value: 'info', text: 'Info' },
                    { value: 'success', text: 'Success' },
                    { value: 'warning', text: 'Warning' },
                    { value: 'error', text: 'Error' },
                    { value: 'download', text: 'Download' },
                    { value: 'note', text: 'Note' }
                ]
            },
            {
                type: 'selectbox', // component type
                name: 'align', // identifier
                label: 'Alignment',
                size: 1, // number of visible values (optional)
                items: [
                    { value: '', text: '' },
                    { value: 'alignright', text: 'Right' },
                    { value: 'alignleft', text: 'Left' },
                    { value: 'aligncenter', text: 'Center' }
                ]
            },
            {
                type: 'input',
                name: 'classes',
                label: 'Custom CSS Class'
            },
            {
                type: 'input',
                name: 'width',
                label: 'Width'
            },
            {
                type: 'textarea',
                name: 'content',
                label: 'Content'
            }
        ]
    },
    buttons: [
        {
            type: 'cancel',
            name: 'closeButton',
            text: 'Cancel'
        },
        {
            type: 'submit',
            name: 'submitButton',
            text: 'Ok',
            primary: true
        }
    ],
    initialData: {
        type: 'shadow',
        align: '',
        classes: '',
        width: '',
        content: ''
    },
    onSubmit: function (api) {
        var data = api.getData();
        var type = data.type;
        var align = data.align;
        var classes = data.classes;
        var width = data.width;
        var content = data.content;
        tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[box type="' + type + '" align="' + align + '" class="' + classes + '" width="' + width + '"] ' + content + ' [/box]');
        api.close();
    }
};

var dialogConfigButton = {
    title: 'Button',
    body: {
        type: 'panel',
        items: [
            {
                type: 'selectbox', // component type
                name: 'color', // identifier
                label: 'Color',
                size: 1, // number of visible values (optional)
                items: [
                    { value: 'red', text: 'Red' },
                    { value: 'orange', text: 'Orange' },
                    { value: 'blue', text: 'Blue' },
                    { value: 'green', text: 'Green' },
                    { value: 'black', text: 'Black' },
                    { value: 'gray', text: 'Gray' },
                    { value: 'white', text: 'White' },
                    { value: 'pink', text: 'Pink' },
                    { value: 'purple', text: 'Purple' }
                ]
            },
            {
                type: 'selectbox', // component type
                name: 'size', // identifier
                label: 'Size',
                size: 1, // number of visible values (optional)
                items: [
                    { value: 'small', text: 'Small' },
                    { value: 'medium', text: 'Medium' },
                    { value: 'big', text: 'Big' }
                ]
            },
            {
                type: 'input',
                name: 'link',
                label: 'Link'
            },
            {
                type: 'input',
                name: 'text',
                label: 'Text'
            },
            {
                type: 'input',
                name: 'icon',
                label: 'Icon (use full Font Awesome name)'
            },
            {
                type: 'checkbox',
                name: 'open_new_window',
                label: 'Open link in a new window/tab'
            }
        ]
    },
    buttons: [
        {
            type: 'cancel',
            name: 'closeButton',
            text: 'Cancel'
        },
        {
            type: 'submit',
            name: 'submitButton',
            text: 'Ok',
            primary: true
        }
    ],
    initialData: {
        color: 'red',
        size: 'small',
        link: 'http://',
        text: '',
        icon: '',
        open_new_window: false
    },
    onSubmit: function (api) {
        var data = api.getData();
        var color = data.color;
        var size = data.size;
        var link = data.link;
        var text = data.text;
        var icon = data.icon;
        var open_new_window = data.open_new_window;
        tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[button color="' + color + '" size="' + size + '" link="' + link + '" icon="' + icon + '" target="' + open_new_window + '"] ' + text + ' [/button]');
        api.close();
    }
};


var dialogConfigBangGia = {
    title: 'Bảng giá dịch vụ',
    body: {
        type: 'panel',
        items: [
            {
                type: 'selectbox', // component type
                name: 'cat_id', // identifier
                label: 'Danh mục',
                size: 1, // number of visible values (optional)
                items: [
                    { value: '5-Internet Cá Nhân', text: 'Cá nhân' },
                    { value: '6-Internet Doanh Nghiệp', text: 'Doanh nghiệp' },
                    { value: '7-Internet Combo', text: 'Combo' }
                ]
            },
            {
                type: 'selectbox', // component type
                name: 'provinces_id', // identifier
                label: 'Khu vực',
                size: 1, // number of visible values (optional)
                items: data
            }
        ]
    },
    buttons: [
        {
            type: 'cancel',
            name: 'closeButton',
            text: 'Cancel'
        },
        {
            type: 'submit',
            name: 'submitButton',
            text: 'Ok',
            primary: true
        }
    ],
    onSubmit: function (api) {
        var data = api.getData();
        var cat_id = data.cat_id.split("-")[0];
        var provinces_id = data.provinces_id.split("-")[0];
        var goi = data.cat_id.split("-")[1];
        var khuvuc = data.provinces_id.split("-")[1];
        tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[go_pricing cat_id="' + cat_id + '" provinces_id="' + provinces_id + '" goi="' + goi + '" khuvuc="' + khuvuc + '"]');
        api.close();
    }
};

tinyMCE.init({
    selector: '.wysiwyg',
    extended_valid_elements: 'span[*]',
    // theme: 'silver',
    // mobile: { theme: 'mobile' },
    height: 400,
    menubar: false,
    branding: false,
    image_advtab: true,
    automatic_uploads: true,
    media_alt_source: false,
    media_poster: false,
    relative_urls: false,
    toolbar_mode: 'wrap',
    fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
    directionality: FleetCart.rtl ? 'rtl' : 'ltr',
    cache_suffix: `?v=${FleetCart.version}`,
    plugins: 'lists, link, table, image, media, paste, autosave, autolink, wordcount, code, fullscreen, textcolor, colorpicker',
    toolbar: 'styleselect fontsizeselect forecolor backcolor bold italic underline shortcode | bullist numlist | blockquote alignleft aligncenter alignright alignjustify| outdent indent | image media link table | code fullscreen',
    // content_css: '/themes/fpt/assets/css/vendor/bootstrap.min.css, /themes/fpt/assets/css/style.css',
    // content_style: `.circle-ihome .item-circle-ihome{ border-radius: 50%;
    //     background: #f6c230;
    //     width: 111px;
    //     height: 111px;
    //     display: table;
    //     margin: 0 auto 15px;
    //     position: relative;
    // }`,
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype == 'image') {
            $('.image-picker-tiny').trigger('click');
        }
    },
    images_upload_handler(blobInfo, success, failure) {
        let formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        $.ajax({
            method: 'POST',
            url: route('admin.media.store'),
            data: formData,
            processData: false,
            contentType: false,
        }).then((file) => {
            success(file.path);
        }).catch((xhr) => {
            failure(xhr.responseJSON.message);
        });
    },
    setup: function (editor) {
        editor.ui.registry.addMenuButton('shortcode', {
            text: 'Shortcode',
            fetch: function (callback) {
                var items = [
                    {
                        type: 'menuitem',
                        text: 'Box',
                        onAction: function (_) {
                            editor.windowManager.open(dialogConfigBox)
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Button',
                        onAction: function (_) {
                            editor.windowManager.open(dialogConfigButton)
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Hỗ trợ',
                        onAction: function (_) {
                            editor.insertContent(`[contact-form-7]`);
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Form liên hệ',
                        onAction: function (_) {
                            editor.insertContent(`[form-lien-he]`);
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Xem Thêm',
                        onAction: function (_) {
                            editor.insertContent(`[view_more][/view_more]`)
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Bảng giá dịch vụ',
                        onAction: function (_) {
                            editor.windowManager.open(dialogConfigBangGia)
                            // editor.insertContent(`[go_pricing]`);
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Bảng giá Internet FPT toàn quốc ',
                        onAction: function (_) {
                            editor.insertContent(`[baogiatoanquocfpt][/baogiatoanquocfpt]`);
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Bảng giá Combo Internet toàn quốc ',
                        onAction: function (_) {
                            editor.insertContent(`[price_combo][/price_combo]`);
                        }
                    },
                    {
                        type: 'menuitem',
                        text: 'Bảng giá FPT Play',
                        onAction: function (_) {
                            editor.windowManager.open(dialogConfigBangGia)
                            // editor.insertContent(`[go_pricing]`);
                        }
                    },
                   
                ];
                callback(items);
            },
        });
    },
});
