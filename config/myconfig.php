<?php

use Illuminate\Support\Facades\Facade;

return [
    'instamojo' => [
        'key' => env('INSTA_MOJO_API_KEY', ''),
        'token' => env('INSTA_MOJO_API_TOKEN', ''),
        'url' => env('INSTA_MOJO_URL', ''),
        'redirect_url' => 'https://enadu.cybernetics.me/thankyou',
        'email' => env('MAIL_FROM_ADDRESS', ''),
    ],     
];

?>