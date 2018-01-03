<?php

// Authentication Routes...
$this->get('login', 'LoginController@showLoginForm')->name('login');
$this->post('login', 'LoginController@login');
$this->post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'ResetPasswordController@reset');

$this->group(['prefix' => 'access'], function (){
    $this->group(['prefix' => 'users'], function (){
        $this->get('/','UserController@index')->name('users.home');
        $this->post('/store','UserController@store')->name('users.store');
        $this->get('/{id}','UserController@show');
    });
});
