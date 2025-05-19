<?php

namespace Themes\Fpt\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Modules\Core\Entities\District;
use Modules\Core\Entities\Province;
use Themes\Fpt\Emails\SendMail;

class SendMailController
{

    public function register() {
        $districts = District::all();
        $provinces = Province::all();
        return view('public.mail.form_register', compact('districts', 'provinces'));
    }

    public function getJson($id) {
        $provinces = Province::find($id)->districts()->pluck('name', 'id'); 
        return response()->json($provinces);
    }

    public function sendMail() {
        $data = request()->all();
        unset($data['_token']);
        $id = request()->provinces;
        $provinces = Province::find($id);
        $provinces = $provinces["name"];
        
        Mail::to('cuong2209s@gmail.com')->send(new SendMail($data,$provinces));
        return view('public.mail.thank_you');
    }

}

