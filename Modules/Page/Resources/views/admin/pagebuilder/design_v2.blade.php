<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GrapesJS Bootstrap v4 Blocks Plugin</title>
    {{-- css --}}
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/grapes.min.css') }}">
    <link rel="stylesheet" href=" {{asset('assets/stylesheets/tooltip.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="http://fpttelecom.test:8081/modules/media/admin/css/media.css" rel="stylesheet">

    @include('admin::partials.globals')

    {{-- js --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src=" {{asset('assets/js/grapes.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-tabs.min.js') }}"></script>
    <script src=" {{asset('assets/js/grapesjs-blocks-bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="http://fpttelecom.test:8081/modules/media/admin/js/media.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
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
        #editor-import .modal-dialog{
            max-width: 70%;
        }
    </style>
</head>
<body>

<div id="gjs" style="height:0px; overflow:hidden">
    <style>
        body {
            background-color: #f4ebf3;
        }
        header {
            margin-top: 4rem;
        }
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
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
                        <p class="lead">This is demo content from <code>index.html</code>. For development, you shouldn't edit this file. Instead, you can copy and rename it to <code>_index.html</code>. The next time the server starts, the new file will be served, and it will be ignored by git.</p>
                    </div>
                </main>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
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
            <iframe allowfullscreen="allowfullscreen" src="https://www.youtube.com/embed/aqz-KE-bpKQ?" class="embed-responsive-item"></iframe>
        </div>
    </div>
</div>

<!-- import modal -->
<div class="modal fade" id="editor-import" tabindex="-1" role="dialog" aria-labelledby="modal-b4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">
            <i class="fas fa-file-import"></i>
            Import
            </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary ml-auto btn-pill" id='import-component'>
            <i class="fa fa-check"></i>
            Import
            </button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
            'grapesjs-tabs',
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
            }
        },
        canvas: {
            styles: [
                'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css'
            ],
            scripts: [
                'https://code.jquery.com/jquery-3.5.1.slim.min.js',
                'https://unpkg.com/@popperjs/core@2',
                'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js'
            ],
        }
    });

    function trans(string)
    {
        return string;
    }

    // editor.on('open-assets', () => {
    //     editor.Commands.run('core:open-assets');
    // });

    editor.Commands.add("open-assets", {
        run(editor, sender, opts) {
            const assettarget = opts.target;
            let picker = new MediaPicker({ type: 'image', title: 'File Manager', message: '' });
            picker.on('select', (file) => {
                assettarget.set("src", file.path);
            });
        }
    });

    var pn = editor.Panels;
    var modal = editor.Modal;
    var cmdm = editor.Commands;



    // Add Button
    pn.addButton('options', {
        id: 'editor-import',
        className: 'fa fa-download',
        command: 'editor-import',
        attributes: {
            'title': 'Import',
            'data-tooltip-pos': 'bottom',
            'data-tooltip': 'Import'
        }
    });

    pn.addButton('options', {
        id: 'undo',
        className: 'fa fa-undo',
        command: 'undo',
        attributes: {
            'title': 'Undo',
            'data-tooltip-pos': 'bottom',
            'data-tooltip': 'Undo'
        }
    });

    pn.addButton('options', {
        id: 'redo',
        className: 'fa fa-repeat',
        command: 'redo',
        attributes: {
            'title': 'Redo',
            'data-tooltip-pos': 'bottom',
            'data-tooltip': 'Redo'
        }
    });

    pn.addButton('options', {
        id: 'save-db',
        className: 'fa fa-floppy-o',
        command: 'save-db',
        attributes: {
            'title': 'Save',
            'data-tooltip-pos': 'bottom',
            'data-tooltip': 'Save'
        }
    });

    cmdm.add('canvas-clear', function() {
        if(confirm('Areeee you sure to clean the canvas?')) {
            var comps = editor.DomComponents.clear();
            setTimeout(function(){ localStorage.clear()}, 0)
        }
    });

    // Add Command
    cmdm.add('save-db',{
        run: function(ed, sender){
            sender && sender.set('active');
            ed.store();
        }
    });

    // Add Command
    cmdm.add('undo',{
        run: function(ed, sender){
            ed.Commands.run('core:undo');
        }
    });

    cmdm.add('redo',{
        run: function(ed, sender){
            ed.Commands.run('core:redo');
        }
    });

    cmdm.add('editor-import',{
        run: function(ed, sender){
            $('#editor-import').modal('show');
        }
    });

    // <li class="nav-item">
    //     <a class="nav-link" data-toggle="modal" id="import" data-target="#editor-import" href="#">
    //         <i class="fas fa-download"></i>
    //         Import
    //     </a>
    // </li>



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

    [['sw-visibility', 'Show Borders'], ['preview', 'Preview'], ['fullscreen', 'Fullscreen'],
        ['export-template', 'Export'] ]
    .forEach(function(item) {
        pn.addButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom', 'data-tooltip': item[1]});
    });


    // Remove Block
    editor.BlockManager.remove('column');
    editor.BlockManager.remove('row');
    editor.BlockManager.remove('tabs-tab');
    editor.BlockManager.remove('tabs-tab-pane');
    // Add Block

    editor.BlockManager.add('row', {
        label: 'Row',
        category: 'Layout',
        attributes: {
            class:'gjs-fonts gjs-f-b1 gjs-columns-1-webmaster' ,
            title: 'Row',
        },
        content: `<div style="height: 75px;" class="row row-webmaster">
                </div>`,

    });

    editor.BlockManager.add('column', {
        label: '1 Column',
        category: 'Layout',
        attributes: {
            class:'gjs-fonts gjs-f-b1 gjs-columns-1-webmaster' ,
            title: '1 Column',

        },
        content: `<div style="height: 75px;" class="row row-webmaster">
                    <div class="col-lg-12"></div>
                </div>`,

    });

    editor.BlockManager.add('twoColumn', {
        label: '2 Columns',
        category: 'Layout',
        attributes: {
            class:'gjs-fonts gjs-f-b2 gjs-columns-2-webmaster' ,
            title: '2 Columns',

        },
        content: `<div style="height: 75px;" class="row row-webmaster">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6"></div>
                </div>`,

    });

    editor.BlockManager.add('threeColumn', {
        label: '3 Columns',
        category: 'Layout',
        attributes: {
            class:'gjs-fonts gjs-f-b3 gjs-columns-3-webmaster' ,
            title: '3 Columns',

        },
        content: `<div style="height: 75px;" class="row row-webmaster">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                </div>`,

    });

    editor.BlockManager.add('quote', {
        label: 'Quote',
        category: 'Layout',
        attributes: {
            class:'fa fa-quote-right' ,
            title: '3 Columns',

        },
        content: `<blockquote class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ipsum dolor sit</blockquote>`,

    });

    editor.BlockManager.add('cellColumn', {
        label: 'Cell Row',
        category: 'Layout',
        attributes: {
            class:'gjs-fonts gjs-f-b1' ,
            title: 'Cell Row',

        },
        content: `<div class="col-lg-4"></div>`,

    });

    editor.BlockManager.add('map-webmaster', {
        label: 'Map',
        attributes: {
            class: "fa fa-map-o",
        },
        category: 'Media',
        content: {
            type: 'map',
            style: {
                height: '350px'
            },
            removable: true,
        }
    })


    // Add Function Block

    function posts(editor){

    }
    //  add components

    // editor.addComponents(`<div>
    //     <img src="https://path/image" />
    //     <span title="foo">Hello world!!!</span>
    // </div>`);
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
