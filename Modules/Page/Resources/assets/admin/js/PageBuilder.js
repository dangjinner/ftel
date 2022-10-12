import grapesjs from 'grapesjs';

export default class {
    constructor(options) {
        this.options = _.merge({
            height: '100%',
            showOffsets: 1,
            noticeOnUnload: 0,
            storageManager: { autoload: 0 },
            container: '#gjs',
            fromElement: true,
            showDevices: false,
            storageManager: {
                autosave: false,
                setStepsBeforeSave: 1,
                type: 'remote',
                urlStore: '{{ route("admin.pages.design.post") }}',
                urlLoad: '{{ route("admin.pages.design.post") }}',
                contentTypeJson: true,
                params: { _token: '{{csrf_token()}}' },
            },
            plugins: [
                'grapesjs-lory-slider',
                'gjs-preset-webpage',
                'grapesjs-blocks-bootstrap4',
            ],
            pluginsOpts: {
                'grapesjs-blocks-bootstrap4': {
                    blocks: {},
                    blockCategories: {},
                    labels: {},
                    gridDevicesPanel: true,
                    formPredefinedActions: [
                        {name: 'Contact', value: '/contact'},
                        {name: 'landing', value: '/landing'},
                    ]
                },
            },
            canvas: {
                styles: [
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css'
                ],
                scripts: [
                    'https://code.jquery.com/jquery-3.5.1.slim.min.js',
                    'https://unpkg.com/@popperjs/core@2.9.2/dist/umd/popper.min.js',
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js'
                ],
            },
        }, options);
    }

    init() {
        grapesjs.init(
            this.options
        );
    }
}
