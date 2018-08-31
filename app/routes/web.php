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

Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'welcome'
]);

Route::get('articles/{slug}', [
    'uses' => 'FrontController@viewArticle',
    'as' => 'index.article'
]);

Route::get('categories/{name}', [
    'uses' => 'FrontController@searchCategory',
    'as' => 'index.searchCategory'
]);

Route::get('tags/{name}', [
    'uses' => 'FrontController@searchTag',
    'as' => 'index.searchTag'
]);

Route::group(['prefix' => 'articles'], function(){
    Route::get('view/{slug}', [
            'uses' => 'Article\ArticleViewController@view',
            'as' => 'articlesViews'
        ]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', [
            'uses' => 'Admin\AdminMainController@main',
            'as' => 'adminMain'
        ]);

    Route::resource('users', 'UsersController');

    Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as' => 'admin.users.destroy'
    ]);

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy', [
        'uses' => 'TagsController@destroy',
        'as' => 'admin.tags.destroy'
    ]);

    Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'admin.articles.destroy'
    ]);

    Route::get('images', [
        'uses' => 'ImagesController@index',
        'as' => 'images.index'
    ]);
});

Route::get('react', function() {
    return view('react');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
