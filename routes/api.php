<?php

Route::get('configure', 'Api\IndexController@configure');

Route::group(['middleware' => 'auth:api'], function () {
    Broadcast::routes();

    Route::any('broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate');

    Route::group(['prefix' => 'users'], function () {
        Route::get('messages', 'Api\MessageController@index');
        Route::get('messages/{user}', 'Api\MessageController@show');
        Route::post('message/{conversation}/seen', 'Api\MessageController@makeSeen');
        Route::post('messages', 'Api\MessageController@store');
        Route::delete('messages/{user}', 'Api\MessageController@destroy');

        Route::get('/auth', 'Api\UsersController@getAuth');
        Route::put('/auth/update', 'Api\UsersController@updateAuth');
        Route::post('/search', 'Api\UsersController@search');
        Route::get('/{user}', 'Api\UsersController@show');
        Route::post('/{user}/rate', 'Api\UsersController@rate');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::post('auth/register/{role?}', 'Api\Auth\RegisterController@register');
    Route::post('password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
});
