<?php

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

    $verification = $twilio->verify->v2->services(env('TWILIO_VERIFICATION_SID'))
        ->verifications
        ->create("+111111", "sms");

    return inertia('Auth/Login');
});

Route::get('/check/{code}', function () {
    $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

    try {
        $verification_check = $twilio->verify->v2->services(env('TWILIO_VERIFICATION_SID'))
            ->verificationChecks
            ->create([
                'to' => "+111111",
                'code' => request()->code
            ]);
    } catch (\Twilio\Exceptions\TwilioException $e) {
        return 'no code found';
    }

    return $verification_check->status;
});

Route::get('/roadmap', function () {
    return inertia('Roadmap');
});
