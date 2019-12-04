<?php

use Illuminate\Http\Request;

/*

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'UserController@index')->name('UserIndex');
Route::post('register', 'UserController@register')->name('UserRegister');
Route::post('login','UserController@login')->name('UserLogin');
