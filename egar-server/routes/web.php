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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@login')->name('homepage.login');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'homepage'], function(){
        Route::get('/', 'Web\HomepageController@index')->name('homepage.index');
    });
});

Route::group(['prefix' => 'cpanel-auth'], function(){
    Route::get('/login', 'Web\CpanelController@login')->name('auth.admin.login');
    Route::get('/logout', 'Web\CpanelController@logout')->name('auth.admin.logout');
    Route::post('/login', 'Web\CpanelController@post_login')->name('auth.admin.login.post');
});

Route::group(['middleware' => 'admin.auth'], function(){
    Route::group(['prefix' => 'control-panel'], function(){
        Route::get('/', 'Web\CpanelController@dashboard')->name('cpanel.dashboard');

        Route::group(['prefix' => 'ajax'], function(){
            Route::get('/get-user/{username}', 'Web\AjaxController@getUserByUsername')->name('ajax.user.get');
        });

        Route::group(['prefix' => 'users'], function(){
            Route::get('/', 'Web\CpanelController@get_users')->name('cpanel.get.users');
            Route::get('/add-new', 'Web\CpanelController@get_add_users')->name('cpanel.get.add.users');
            Route::post('/add-new', 'Web\CpanelController@post_add_users')->name('cpanel.post.add.users');
            Route::post('/update', 'Web\CpanelController@updateUser')->name('cpanel.post.update.user');
            Route::get('/ban/{username}', 'Web\CpanelController@banUser')->name('cpanel.get.ban.user');
        });

        Route::group(['prefix' => 'store'], function(){
            Route::get('/', 'Web\StoreController@index')->name('cpanel.store.index');
            Route::get('/create', 'Web\StoreController@create')->name('cpanel.store.create');
            Route::post('/', 'Web\StoreController@store')->name('cpanel.store.store');
            Route::get('/{id}', 'Web\StoreController@show')->name('cpanel.store.show');
            Route::get('/{id}/edit')->name('cpanel.store.edit');
            Route::put('/{id}')->name('cpanel.store.update');
            Route::get('/delete/{id}', 'Web\StoreController@destroy')->name('cpanel.store.delete');
            Route::get('/remove/{id}', 'Web\StoreController@remove')->name('cpanel.store.remove');
        });
    });
});