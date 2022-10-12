<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GrapesJS Demo - Free Open Source Website Page Builder</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="Best Free Open Source Responsive Websites Builder" name="description">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/toastr.min.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/grapes.min.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/grapesjs-preset-webpage.min.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/tooltip.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/grapesjs-plugin-filestack.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/demos.css') }}">
    <link href="https://unpkg.com/grapick/dist/grapick.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="http://fpttelecom.test:8081/modules/media/admin/css/media.css" rel="stylesheet">


    <script src="//static.filestackapi.com/v3/filestack.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    @include('admin::partials.globals')

    <script src=" {{asset('assets/js/toastr.min.js') }}"></script>

    <script src=" {{asset('assets/js/grapes.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-preset-webpage.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-lory-slider.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-tabs.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-custom-code.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-touch.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-parser-postcss.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-tooltip.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-tui-image-editor.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-typed.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-style-bg.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-blocks-bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="http://fpttelecom.test:8081/modules/media/admin/js/media.js"></script>

    <style>
        .media-picker-modal .modal-dialog,
        .media-picker-modal .container{
            width: 100%;
            max-width: 100%;
        }
        .media-picker-modal .modal-header{
            flex-direction: row-reverse;
            align-items: center;
        }
        .media-picker-modal .row{
            flex-direction: column;
        }
        .media-picker-modal .close{
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <input type="hidden" name="image-picker" class="image-picker">
    <input type="hidden" name="over_image" id="over_image" class="image-picker-tiny">
    <div id="gjs" style="height:0px; overflow:hidden">
        <style>
            body {
                background-color: #f4ebf3;
            }

            header {
                margin-top: 4rem;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            .h1,
            .h2,
            .h3,
            .h4,
            .h5,
            .h6 {
                color: #9f5497;
            }

            .jumbotron {
                background-color: #d0bace;
            }
        </style>
        <!--<div style="margin:100px 100px 25px; padding:25px; font:caption">
          This is a demo content from index.html. For the development, you shouldn't edit this file, instead you can
          copy and rename it to _index.html, on next server start the new file will be served, and it will be ignored by git.
        </div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <header class="header clearfix">
                        <h1>GrapesJS Bootstrap v4 Blocks Plugin</h1>
                    </header>
                    <main role="main">
                        <div class="jumbotron">
                            <h1 class="display-4">Hello!</h1>
                            <p class="lead">This is demo content from <code>index.html</code>. For development, you
                                shouldn't edit this file. Instead, you can copy and rename it to
                                <code>_index.html</code>. The next time the server starts, the new file will be served,
                                and it will be ignored by git.</p>
                        </div>
                    </main>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                    <div>Col</div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">Home</div>
                        <div class="tab-pane" id="profile" role="tabpanel">Profile</div>
                        <div class="tab-pane" id="messages" role="tabpanel">Messages</div>
                        <div class="tab-pane" id="settings" role="tabpanel">Settings</div>
                    </div>
                </div>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe allowfullscreen="allowfullscreen" src="https://www.youtube.com/embed/aqz-KE-bpKQ?"
                    class="embed-responsive-item"></iframe>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function customPlugin(editor){
            //slide1
            editor.BlockManager.add('slide1', {
                category : 'Carousel',
                label: '<h1><i class="far fa-play-circle fa-lg"></i></h1> Slides only',
                content : '<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel"> <div class="carousel-inner"> <div class="carousel-item active"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(35).jpg"> </div> <div class="carousel-item"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(33).jpg"> </div> <div class="carousel-item"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg"> </div> </div> </div>'
            });
            //slide2
            editor.BlockManager.add('slide2', {
                category : 'Carousel',
                label: '<h1><i class="far fa-play-circle fa-lg"></i></h1> Slides With controls',
                content : '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> <div class="carousel-inner"> <div class="carousel-item active"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg" alt="First slide"> </div> <div class="carousel-item"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg" alt="Second slide"> </div> <div class="carousel-item"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg" alt="Third slide"> </div> </div> <a onclick="prevSlide()" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span onclick="prevSlide()" class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a onclick="nextSlide()" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>'
            });
        };
        var editor = grapesjs.init({
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
                customPlugin
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
            }
        });

        var pn = editor.Panels;
        var modal = editor.Modal;
        var cmdm = editor.Commands;
        cmdm.add('save-db',{
            run: function(ed, sender){
                sender && sender.set('active');
                ed.store();
            }
        });
        pn.addButton('options', {
            id: 'save-db',
            className: 'fa fa-floppy-o',
            command: 'save-db',
            attributes: {
                'title': 'Save',
                'data-tooltip-pos': 'bottom',
            }
        });
        cmdm.add('canvas-clear', function() {
            if(confirm('Areeee you sure to clean the canvas?')) {
                var comps = editor.DomComponents.clear();
                setTimeout(function(){ localStorage.clear()}, 0)
            }
        });
        cmdm.add('set-device-desktop', {
            run: function(ed) { ed.setDevice('Desktop') },
            stop: function() {},
        });
        cmdm.add('set-device-tablet', {
            run: function(ed) { ed.setDevice('Tablet') },
            stop: function() {},
        });
        cmdm.add('set-device-mobile', {
            run: function(ed) { ed.setDevice('Mobile portrait') },
            stop: function() {},
        });

        // Simple warn notifier
        var origWarn = console.warn;
        toastr.options = {
            closeButton: true,
            preventDuplicates: true,
            showDuration: 250,
            hideDuration: 150
        };
        console.warn = function (msg) {
            if (msg.indexOf('[undefined]') == -1) {
                toastr.warning(msg);
            }
            origWarn(msg);
        };

        function trans(string)
        {
            return string;
        }

        editor.Commands.add("open-assets", {
            run(editor, sender, opts) {
                const assettarget = opts.target;
                let picker = new MediaPicker({ type: 'image', title: 'File Manager', message: '' });
                picker.on('select', (file) => {
                    assettarget.set("src", file.path);
                });
            }
        });


        // Add and beautify tooltips
        [['sw-visibility', 'Show Borders'], ['preview', 'Preview'], ['fullscreen', 'Fullscreen'],
         ['export-template', 'Export'], ['undo', 'Undo'], ['redo', 'Redo'],
         ['gjs-open-import-webpage', 'Import'], ['canvas-clear', 'Clear canvas']]
        .forEach(function(item) {
            pn.addButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
        });
        [['open-sm', 'Style Manager'], ['open-layers', 'Layers'], ['open-blocks', 'Blocks']]
        .forEach(function(item) {
            pn.addButton('views', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
        });
        var titles = document.querySelectorAll('*[title]');

        for (var i = 0; i < titles.length; i++) {
            var el = titles[i];
            var title = el.getAttribute('title');
            title = title ? title.trim(): '';
            if(!title)
                break;
            el.setAttribute('data-tooltip', title);
            el.setAttribute('title', '');
        }

        // Show borders by default
        pn.getButton('options', 'sw-visibility').set('active', 1);


        // Do stuff on load
        editor.on('load', function() {
            var $ = grapesjs.$;

            // Load and show settings and style manager
            var openTmBtn = pn.getButton('views', 'open-tm');
            openTmBtn && openTmBtn.set('active', 1);
            var openSm = pn.getButton('views', 'open-sm');
            openSm && openSm.set('active', 1);

            // Add Settings Sector
            var traitsSector = $('<div class="gjs-sm-sector no-select">'+
                '<div class="gjs-sm-title"><span class="icon-settings fa fa-cog"></span> Settings</div>' +
                '<div class="gjs-sm-properties" style="display: none;"></div></div>');
            var traitsProps = traitsSector.find('.gjs-sm-properties');
            traitsProps.append($('.gjs-trt-traits'));
            $('.gjs-sm-sectors').before(traitsSector);
            traitsSector.find('.gjs-sm-title').on('click', function(){
                var traitStyle = traitsProps.get(0).style;
                var hidden = traitStyle.display == 'none';
                if (hidden) {
                traitStyle.display = 'block';
                } else {
                traitStyle.display = 'none';
                }
            });

            // Open block manager
            var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
            openBlocksBtn && openBlocksBtn.set('active', 1);

        });

        window.editor = editor;
    </script>
    <script>
    const CodeMirror_config = {
        export: {
            readOnly: 1,
            theme: 'hopscotch',
            autoBeautify: true,
            lineWrapping: true,
            smartIndent: true,
            indentWithTabs: true,
        },
        import: {
            readOnly: 0,
            theme: 'hopscotch',
            autoBeautify: true,
            autoCloseTags: true,
            autoCloseBrackets: true,
            lineWrapping: true,
            styleActiveLine: true,
            smartIndent: true,
            indentWithTabs: true,
        }
    };
    $(document).ready(function(){
        var editor = window.editor;
        $('#editor-import').on('shown.bs.modal', ()=>{
            console.log('a');
            document.querySelector('#editor-import .modal-body div').innerHTML = "";
            let txtarea_html = document.createElement('textarea');
            document.querySelector('#editor-import .modal-body div').appendChild(txtarea_html);
            var codeViewer_html = editor.CodeManager.getViewer('CodeMirror').clone().set({
                ...CodeMirror_config.import,
                codeName: 'htmlmixed',
                input: txtarea_html
            });

            codeViewer_html.init(txtarea_html);
            codeViewer_html.setContent('');
            codeViewer_html.editor.refresh();

            $('#import-component')[0].onclick = (e)=>{
                editor.setComponents(codeViewer_html.editor.getValue().trim());
                $('#editor-import').modal('hide');
                document.querySelector('#editor-import .modal-body div').innerHTML = "";
            }
        });
    });
</script>
</body>

</html>
