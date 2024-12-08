<?php

use Modules\Affiliate\Entities\AffiliateAccount;

return [
    'accounts' => 'Accounts',
    'account' => 'Account',
    'tabs' => [
        'general' => 'General',
        'user' => 'User',
        'groups' => [
            'basic_info' => 'Basic Info'
        ]
    ],
    'attributes' => [
        'last_name' => 'Last Name',
        'first_name' => 'First Name',
        'is_active' => 'Is Active',
        'status' => 'Status',
        'email' => 'Email',
        'phone_number' => 'Phone Number',
        'address' => 'Address',
        'type' => 'Type',
    ],
    'form' => [
        'enable_the_account' => 'Enable the account',
        'base_image' => 'Base Image',
        'statuses' => [
            2 => 'Pending',
            1 => 'Active',
            0 => 'Deactivate',
        ],
        'types' => [
            AffiliateAccount::TYPE_NORMAL => 'Normal',
            AffiliateAccount::TYPE_AGENCY => 'Agency',
        ]
    ],
    'table' => [
        'name' => 'Name',
        'full_name' => 'Full Name',
        'email' => 'Email',
        'phone_number' => 'Phone Number',
        'type' => 'Type',
    ]
];
