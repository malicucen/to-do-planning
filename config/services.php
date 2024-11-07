<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'task_provider_one' => [
        'url' => env('TASK_PROVIDER_ONE_URL', 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one'),
        'enabled' => env('TASK_PROVIDER_ONE_ENABLED', true),
    ],

    'task_provider_two' => [
        'url' => env('TASK_PROVIDER_TWO_URL', 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-two'),
        'enabled' => env('TASK_PROVIDER_TWO_ENABLED', true),
    ],

];
