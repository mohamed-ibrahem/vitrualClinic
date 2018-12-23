<?php

Route::get('configure', 'Admin\TranslationsController@getIndex');

Route::get('/get_auth_user', function(\Illuminate\Http\Request $request) {
    return $request->user();
})->middleware('auth:api');
