<?php

return [
    'admin.affiliate.products' => [
        'index' => 'affiliate::permissions.products.index',
        'create' => 'affiliate::permissions.products.create',
        'edit' => 'affiliate::permissions.products.edit',
        'destroy' => 'affiliate::permissions.products.destroy',
    ],
    'admin.affiliate.accounts' => [
        'index' => 'affiliate::permissions.accounts.index',
        'create' => 'affiliate::permissions.accounts.create',
        'edit' => 'affiliate::permissions.accounts.edit',
        'destroy' => 'affiliate::permissions.accounts.destroy',
    ],
];
