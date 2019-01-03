<?php

Route::get('configure', 'Api\IndexController@configure');

Route::group(['middleware' => ['auth:api', 'talk:api']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/getCurrent', 'Api\UsersController@getAuth');
        Route::post('/search', 'Api\UsersController@search');
        Route::get('/{user}', 'Api\UsersController@show');

        Route::get('messages/{id}', 'Api\MessageController@index');
        Route::post('messages', 'Api\MessageController@store');
        Route::delete('messages/{id}', 'Api\MessageController@destroy');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::post('auth/register/{role?}', 'Api\Auth\RegisterController@register');
    Route::post('password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
});
