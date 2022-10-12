<?php

namespace Modules\Core\Shortcodes;

use Modules\CategoryService\Entities\CategoryService;

class CameraPricesCustomShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $data['category_services_camfpt'] = CategoryService::with('services', 'parent')->findOrFail(21);
        $data['category_services_cloud'] = CategoryService::with('services', 'parent')->findOrFail(22);

        $data['category_services'] = CategoryService::findOrFail(14);
        $data['shortcode'] = $shortcode;
        return view('public.shortcode.custom.camera_prices_custom', $data);
    }

}
