<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('adduser',   'Api\UserApiController@store');

Route::get('getuser/{id}', 'Api\UserApiController@getuserbyId');
Route::post('updateuser/{id}', 'Api\UserApiController@updateuser');
Route::delete('deleteuser/{id}', 'Api\UserApiController@deleteuser');
Route::post('file-upload',           'Api\UserApiController@upload');


Route::post('login',   'Api\UserApiController@login');
Route::get('login',    'Api\UserApiController@login');
Route::post('register', 'Api\UserApiController@register');

Route::group(['middleware' => 'auth:api' ], function() {

    Route::post('logout',   'Api\UserApiController@logout');   
    Route::get('getuser',    'Api\UserApiController@getuser');

});

