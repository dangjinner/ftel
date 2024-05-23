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
    'admin.affiliate.links' => [
        'index' => 'affiliate::permissions.links.index',
        'create' => 'affiliate::permissions.links.create',
        'edit' => 'affiliate::permissions.links.edit',
        'destroy' => 'affiliate::permissions.links.destroy',
    ],
];
