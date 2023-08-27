<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;

$limiter = config('fortify.limiters.login');
$twoFactorLimiter = config('fortify.limiters.two-factor');
$verificationLimiter = config('fortify.limiters.verification', '6,1');

Route::controller(AuthenticatedSessionController::class)
    ->middleware('guest:'.config('fortify.guard'))
    ->group(function () use ($limiter) {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')
            ->middleware(array_filter([
                'guest:'.config('fortify.guard'),
                $limiter ? 'throttle:'.$limiter : null,
            ]))
            ->name('login');
    });

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Password Reset...
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.request');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.reset');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.update');

// Passwords...
Route::put('/user/password', [PasswordController::class, 'update'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    ->name('user-password.update');

// Password Confirmation...
Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);

Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    ->name('password.confirmation');

Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    ->name('password.confirm');

// Two Factor Authentication...
Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('two-factor.login');

Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
    ]));

$twoFactorMiddleware = [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm'];

Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.enable');

Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.confirm');

Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.disable');

Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.qr-code');

Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.secret-key');

Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
    ->middleware($twoFactorMiddleware)
    ->name('two-factor.recovery-codes');

Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
    ->middleware($twoFactorMiddleware);
