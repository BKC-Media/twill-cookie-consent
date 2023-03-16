<?php

use BKCmedia\TwillCookieConsent\Http\Controllers\CookieConsentController;

Route::middleware('web')->name('cookies.')->group(function () {
    Route::post('accepted', [CookieConsentController::class, 'acceptedAll'])->name('accept');
    Route::post('selection', [CookieConsentController::class, 'acceptedSelection'])->name('accept-selection');
});