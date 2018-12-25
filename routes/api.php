<?php

Route::get('configure', 'Api\IndexController@configure');

Route::group(['middleware' => 'guest', 'namespace' => 'Api\\'], function() {
    Route::post('auth/register/{role?}', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
});
