<?php

use Illuminate\Support\Facades\Facade;

return [
    'instamojo' => [
        'key' => env('INSTA_MOJO_API_KEY', ''),
        'token' => env('INSTA_MOJO_API_TOKEN', ''),
        'test_url' => env('INSTA_MOJO_TEST_URL', ''),
        'payment_url' => env('INSTA_MOJO_PAYMENT_URL', ''),
        'redirect_url' => 'https://enadu.cybernetics.me/thankyou',
        'email' => env('MAIL_FROM_ADDRESS', ''),
    ],     
];

?>