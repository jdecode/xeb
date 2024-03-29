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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => config('env_vars.GITHUB_CLIENT_ID'),
        'client_secret' => config('env_vars.GITHUB_CLIENT_SECRET'),
        'redirect' => config('env_vars.GITHUB_CALLBACK'),
    ],
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => config('env_vars.SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => config('env_vars.SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'telegram-bot-api' => [
        'token' => config('env_vars.TELEGRAM_BOT_TOKEN'),
        'channel' => config('env_vars.TELEGRAM_NOTIFICATIONS_DEFAULT_CHANNEL'),
        'chat_id' => config('env_vars.TELEGRAM_NOTIFICATIONS_DEFAULT_CHAT_ID'),
    ],

];
