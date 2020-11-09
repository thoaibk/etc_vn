<?php
return [
    'name' => env('COMMON_NAME'),

    'contact' => [
        'email' => env('COMMON_CONTACT_EMAIL'),
        'phone' => env('COMMON_CONTACT_PHONE'),
        'phone_display' => env('COMMON_CONTACT_PHONE_DISPLAY'),
        'address' => env('COMMON_CONTACT_ADDRESS')
    ],

    'email_subjects' => [
        'reset_password' => 'Link đặt lại mật khẩu tại ' . env('APP_NAME')
    ]
];
