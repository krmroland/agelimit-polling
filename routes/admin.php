<?php


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::put('token/{token}/activate', 'TokenActivationController@update');
    Route::resource('tokens', 'AuthyTokensController');
    Route::resource('notifications', 'NotificationsController');

    Route::get('age-limit', 'AgeLimitPollController@index')->name('age-limit.index');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@login')->name('postLogin');
