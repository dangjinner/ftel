<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => \Modules\User\Entities\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google_sheet' => [
        'id'    => env('GOOGLE_SHEET_ID'),
    ],

    'google_sheet_customer' => [
        'id'    => env('GOOGLE_SHEET_ID_2'),
    ],

    'google_sheet_adsen' => [
        'id' => env('GOOGLE_SHEET_ADSEN'),
    ],

     'google_sheet_adz' => [
        'id' => env('GOOGLE_SHEET_ADZ'),
    ],

    'google_recaptcha' => [
        'key' => env('SITE_KEY_GOOGLE_API'),
        'secret' => env('SECRET_KEY_GOOGLE_API'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', ''),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', ''),
        'redirect' => env('FACEBOOK_CLIENT_CALLBACK_URL', ''),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', ''),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', ''),
        'redirect' => env('GOOGLE_CLIENT_CALLBACK_URL', ''),
    ],
];
