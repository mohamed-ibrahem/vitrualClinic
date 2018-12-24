<?php

Route::get('configure', 'Api\IndexController@configure');

Route::get('/get_auth_user', function(\Illuminate\Http\Request $request) {
    return $request->user();
})->middleware('auth:api');
