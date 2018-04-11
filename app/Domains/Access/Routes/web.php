<?php

// Authentication Routes...
Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Route::prefix('access')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('/','UserController@index')->name('users.home');
        Route::get('/create','UserController@create')->name('users.create');
        Route::post('/store','UserController@store')->name('users.store');
        Route::get('/{id}/edit','UserController@edit')->name('users.edit');
        Route::patch('/{id}','UserController@update')->name('users.restore');
    });
});
