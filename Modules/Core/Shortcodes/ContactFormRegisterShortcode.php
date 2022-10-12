<?php

namespace Modules\Core\Shortcodes;

class ContactFormRegisterShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('public.shortcode.contact_form_register', compact('shortcode'));
    }

}
