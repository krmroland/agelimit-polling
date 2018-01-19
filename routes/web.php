<?php


Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/login', '/');

Route::post('agelimit/poll', 'AgeLimitPollController@store');

Route::get(
    'age-limit-verification/resendCode',
    'AgeLimitPhoneVerificationController@resend'
)->name('age-limit-verification.resendCode');

Route::resource('age-limit-verification', 'AgeLimitPhoneVerificationController');

Route::post('subscriptions', 'SubscriptionsController@store');
