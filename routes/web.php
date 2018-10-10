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
    'prefix' => 'admin'
], function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('home');

    Route::group([
        'middleware' => ['auth', 'role:admin']
    ], function () {
        Route::post('auth/logout', 'Admin\Auth\LoginController@logout')
            ->name('auth.logout');
    });
});

Route::group([
    'as' => 'member.',
    'prefix' => 'member'
], function () {
    Route::group([
        'middleware' => ['auth', 'role:member']
    ], function () {
        //
    });

    Route::group([
        'middleware' => ['guest']
    ], function () {
        //
    });
});

Route::group([
    'as' => 'doctor.',
    'prefix' => 'doctor'
], function () {
    Route::group([
        'middleware' => ['auth', 'role:doctor']
    ], function () {
        //
    });

    Route::group([
        'middleware' => ['guest']
    ], function () {
        //
    });
});

Route::group([
    'as' => 'web.'
], function() {
    Route::get('/', 'PagesController@index')->name('index');

    Route::group([
        'middleware' => ['guest']
    ], function () {
        Route::group([
            'prefix' => 'auth',
            'as' => 'auth.',
            'namespace' => '\App\Http\Controllers\Auth'
        ], function () {
            Route::get('login', 'LoginController@showLoginForm')
                ->name('login');
            Route::post('login', 'LoginController@login')
                ->name('login.post');

            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
                ->name('password.email');
            Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
                ->name('password.request');
            Route::post('password/reset', 'ResetPasswordController@reset');
            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
                ->name('password.reset');

            Route::get('register', 'RegisterController@showRegistrationForm')
                ->name('register');
            Route::post('register', 'RegisterController@register')
                ->name('register.post');
        });
    });
});
