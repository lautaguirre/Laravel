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
    return view('welcome', ['name' => 'Lautaro']);
});

Route::group(['prefix' => 'articles'], function(){
    Route::get('view/{slug}', [
            'uses' => 'Article\ArticleViewController@view',
            'as' => 'articlesViews'
        ]);
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [
            'uses' => 'Admin\AdminMainController@main',
            'as' => 'adminMain'
        ]);

    Route::resource('users', 'UsersController');

    Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as' => 'admin.users.destroy'
    ]);
});

Route::get('react', function() {
    return view('react');
});