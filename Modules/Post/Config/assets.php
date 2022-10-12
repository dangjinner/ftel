<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define which assets will be available through the asset manager
    |--------------------------------------------------------------------------
    | These assets are registered on the asset manager
    */
    'all_assets' => [
        'admin.post.js' => ['module' => 'post:admin/js/post.js'],
        'admin.post.slug.js' => ['module' => 'post:admin/js/slug.js'],
        'admin.post.slug.css' => ['module' => 'post:admin/css/slug.css'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Define which default assets will always be included in your pages
    | through the asset pipeline
    |--------------------------------------------------------------------------
    */
    'required_assets' => [],
];
