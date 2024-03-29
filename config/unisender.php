<?php

return [
    'apiKey' => env('UNISENDER_API_KEY', ''),

    'apiUrl' => env('UNISENDER_API_URL', ''),

    'apiRoutes' => [
        'importContacts' => env('UNISENDER_API_URL', '') . 'importContacts' . '?format=json&api_key=' . env('UNISENDER_API_KEY', '')
    ]

];
