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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '1932066946858202',         // Your Facebook Client ID
    'client_secret' => 'ce6bae6211b570cb9a2220b7ad775bfc', // Your Facebook Client Secret
    'redirect' => 'http://localhost/ecosanjal/login/facebook/callback',
    ],


    'google' => [ 
                'client_id' => '99806559673-su9b4dv0cda1dthp5lmmb7o5rr9k0c1a.apps.googleusercontent.com',
                'client_secret' => '8DARnoqOGw7K3-h5RIdxJA-G',
                'redirect' => 'http://localhost/ecosanjal/login/google/callback', 
        ],

];
