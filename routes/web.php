<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin']
], function () {
    Route::get('/', 'Admin\PagesController@index')->name('home');
});

Route::group([
    'as' => 'member.',
    'prefix' => 'member',
    'middleware' => ['auth', 'role:member']
], function () {
    Route::get('/', 'Member\PagesController@index')->name('home');
});

Route::group([
    'as' => 'doctor.',
    'prefix' => 'doctor',
    'middleware' => ['auth', 'role:doctor']
], function () {
    Route::get('/', 'Doctor\PagesController@index')->name('home');
});

Route::group([
    'as' => 'web.'
], function() {
    Route::group([
        'middleware' => ['guest']
    ], function () {
        Route::get('/', 'PagesController@index')->name('index');

        Route::group([
            'prefix' => 'auth',
            'as' => 'auth.',
        ], function () {
            Route::get('login', 'Auth\LoginController@showLoginForm')
                ->name('login');
            Route::post('login', 'Auth\LoginController@login')
                ->name('login.post');

            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
                ->name('password.email');
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
                ->name('password.request');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
                ->name('password.reset');

            Route::get('register', 'Auth\RegisterController@showRegistrationForm')
                ->name('register');
            Route::post('register', 'Auth\RegisterController@register')
                ->name('register.post');
        });
    });

    Route::group([
        'middleware' => ['auth']
    ], function() {
        Route::post('auth/logout', 'Auth\LoginController@logout')
            ->name('auth.logout');
    });
});
