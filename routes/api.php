<?php

Route::get('configure', 'Api\IndexController@configure');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users/getCurrent', 'Api\UsersController@getAuth');
    Route::post('users/search', 'Api\UsersController@search');
    Route::get('users/{user}', 'Api\UsersController@show');
});

Route::group(['middleware' => 'guest'], function() {
    Route::post('auth/register/{role?}', 'Api\Auth\RegisterController@register');
    Route::post('password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
});
