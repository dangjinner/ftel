<?php

namespace Modules\Media\Http\Controllers\Admin;

use Illuminate\Http\Request;

class FileManagerController
{
    /**
     * Display a listing of the resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = request('type');
        // $type = null;
        return view('media::admin.file_manager.index', compact('type'));
    }
}
