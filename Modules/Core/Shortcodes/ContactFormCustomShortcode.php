<?php

namespace Modules\Core\Shortcodes;

use Illuminate\Support\Facades\URL;
use Modules\Page\Entities\Page;

class ContactFormCustomShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $configData = [];
        foreach(request()->segments() as $segment) {
            $page = Page::where('slug', $segment)->first();
            if($page !== null) {
               $configData = json_decode($page->custom) ?? [];
               continue;
            }
        }
        return view('public.shortcode.custom.contact_form_custom', compact('shortcode', 'configData'));
    }

}
