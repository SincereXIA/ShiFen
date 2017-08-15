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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('articles','ArticlesController');

Route::group(['prefix' => ''], function(){
    Route::get('','ShowIndexController@index');
    Route::get('about','ShowIndexController@about');
});

Auth::routes();


Route::resource('/progress', 'Project\ProgressController');
/*动作	URI	                    操作	    路由名称
GET	    /photos	                index	photos.index
GET	    /photos/create	        create	photos.create
POST	/photos	                store	photos.store
GET	    /photos/{photo}	        show	photos.show
GET	    /photos/{photo}/edit    edit	photos.edit
PUT/PATCH/photos/{photo}	    update	photos.update
DELETE	/photos/{photo}	        destroy	photos.destroy*/

Route::resource('/messageBoard', 'Project\MessageBoardController');
Route::get('/messageBoard/reply/{id}', 'Project\MessageBoardController@reply')->name('messageBoard.reply');

Route::group(['prefix' => 'voyager'], function () {
    Voyager::routes();
});

Route::group(['prefix' => '/admin', 'middleware' => 'superAdmin'], function () {
    Route::get('/', 'AdminController@index');
});

Route::group(['prefix' => '/home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/sign-log', 'HomeController@signLog')->name('userSignLog');
    Route::resource('/sign-excuse', 'Sign\ExcuseController');
});


