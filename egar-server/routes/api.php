<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/user/email/{email}', 'API\UserController@getUserByEmail');
    Route::get('/user/username/{username}', 'API\UserController@getUserByUsername');
    Route::put('/user/update/', 'API\UserController@update');
    
    Route::group(['prefix' => 'store'], function(){
        Route::get('/all', 'API\MapController@getAllStore')->name('store_all');
        Route::post('/add', 'API\MapController@addNewStore')->name('store_add');
        Route::post('/closest', 'API\MapController@getClosestStore')->name('store_closest');
    });
});

Route::post('/register', 'API\PassportController@register');
