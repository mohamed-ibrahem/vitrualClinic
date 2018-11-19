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
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'role:admin']
], function () {
    Route::get('/', 'Admin\PagesController@index')->name('home');

    Route::get('/system/{page?}', 'Admin\PagesController@settings')->name('settings');
    Route::post('/system/{page?}', 'Admin\PagesController@postSettings');

    Route::resources([
        'admins' => 'Admin\AdminsController',
        'doctors' => 'Admin\DoctorsController',
        'members' => 'Admin\MembersController'
    ]);
    Route::patch('/doctors/{doctor}/ban', 'Admin\DoctorsController@ban')->name('doctors.ban');
    Route::patch('/doctors/{doctor}/unban', 'Admin\DoctorsController@unban')->name('doctors.unban');
    Route::patch('/members/{member}/ban', 'Admin\DoctorsController@ban')->name('members.ban');
    Route::patch('/members/{member}/unban', 'Admin\DoctorsController@unban')->name('members.unban');

    Route::post('auth/logout', 'Auth\LoginController@logout')
        ->name('logout');
    Route::group([
        'prefix' => 'languages',
        'as' => 'languages.'
    ], function() {
        Route::get('/', 'Admin\TranslationsController@getIndex')->name('index');
        Route::post('/edit/{groupKey}', 'Admin\TranslationsController@postEdit');
        Route::post('/import', 'Admin\TranslationsController@postImport');
        Route::post('/publish', 'Admin\TranslationsController@postPublish');
    });
});

Route::group([
    'prefix' => 'auth',
    'middleware' => 'guest'
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

    Route::get('register/{role?}', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');
    Route::post('register/{role}', 'Auth\RegisterController@register')
        ->name('register.post');
});

Route::get('/', 'PagesController@index')->name('index');
