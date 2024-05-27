<?php

use Modules\Affiliate\Entities\AffiliateCustomer;

return [
    'customers' => 'Customers',
    'customer' => 'Customer',
    'tabs' => [
        'general' => 'General',
        'additional' => 'Additional',
        'groups' => [
            'basic_info' => 'Basic Info'
        ]
    ],
    'attributes' => [
        'name' => 'Name',
        'phone_number' => 'Phone Number',
        'address' => 'Address',
        'service_option' => 'Service Option',
        'note' => 'Note',
        'ip' => 'IP Address',
        'utm_medium' => 'Utm Medium',
        'utm_source' => 'Utm Source',
        'utm_content' => 'Utm Content',
        'utm_campaign' => 'Utm Campaign',
        'utm_term' => 'Utm Term',
        'from_page_url' => 'From Page Url',
        'status' => 'Status'
    ],
    'form' => [
        'enable_the_customer' => 'Enable the customer',
        'base_image' => 'Base Image',
        'status' => [
            AffiliateCustomer::PROCESSING => 'Đang chờ xử lý',
            AffiliateCustomer::COMPLETED => 'Hoàn thành',
            AffiliateCustomer::REJECTED => 'Từ chối',
        ]
    ],
    'table' => [
        'name' => 'Name',
        'phone_number' => 'Phone Number',
        'service_option' => 'Service Option',
        'status' => 'Status'
    ]
];
