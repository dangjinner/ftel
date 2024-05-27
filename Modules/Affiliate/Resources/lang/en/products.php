<?php
use Modules\Affiliate\Entities\AffiliateProduct;

return [
    'products' => 'Products',
    'product' => 'Product',
    'tabs' => [
        'general' => 'General',
        'images' => 'Images',
        'price' => 'Price',
        'groups' => [
            'basic_info' => 'Basic Info'
        ]
    ],
    'attributes' => [
        'name' => 'Name',
        'is_active' => 'Is Active',
        'status' => 'Status',
        'description' => 'Description',
        'info' => 'Info',
        'type' => 'Type',
        'page_url' => 'Page URL',
        'is_set_cookie' => 'Cookie',
        'cookie_duration' => 'Cookie Duration',
        'commission' => 'Commission',
        'commission_type' => 'Commission Type',
        'price' => 'Price',
    ],
    'form' => [
        'enable_the_product' => 'Enable the product',
        'enable_set_cookie' => 'Enable set cookie',
        'base_image' => 'Base Image',
        'types' => [
            1 => 'For product and service',
            2 => 'For page url'
        ],
        'commission_types' => [
            AffiliateProduct::COMMISSION_MONEY => 'Into Money',
            AffiliateProduct::COMMISSION_PERCENT => 'Percent',
        ]
    ],
    'table' => [
        'name' => 'Name',
        'thumbnail' => 'Thumbnail'
    ]
];
