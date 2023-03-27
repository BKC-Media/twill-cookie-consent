<?php

use BKCmedia\TwillCookieConsent\Http\Controllers\CookieConsentController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->name('cookies.')->group(function () {
    Route::post('cookies/handle', [CookieConsentController::class, 'handleCookies'])->name('handle');
});