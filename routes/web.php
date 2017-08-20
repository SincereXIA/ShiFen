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

Route::group(['prefix' => '/superadmin', 'middleware' => 'superAdmin'], function () {
    Route::get('/', 'AdminController@index');
});

Route::group(['prefix' => '/home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/sign-log', 'HomeController@signLog')->name('userSignLog');
    Route::resource('sign-excuse', 'Sign\ExcuseController');
});

//Route::resource('sign-table', 'Sign\TableController');

Route::group(['prefix' => 'admin', 'middleware' => 'enterAdmin'], function () {
    Route::get('sign-excuse', 'Admin\Sign\ExcuseController@index')->name('sign-excuse.adminIndex');
    Route::get('sign-excuse/{excuse_id}', 'Admin\Sign\ExcuseController@show')->name('sign-excuse.adminShow');
    Route::patch('sign-excuse/{excuse_id}/pass', 'Admin\Sign\ExcuseController@pass')->name('sign-excuse.pass');
    Route::patch('sign-excuse/{excuse_id}/refuse', 'Admin\Sign\ExcuseController@refuse')->name('sign-excuse.refuse');
    Route::get('sign-table/', 'Admin\Sign\TableController@index')->name('sign-table.index');
    Route::get('sign-table/create/{group_id}', 'Admin\Sign\TableController@create')->name('sign-table.create');
    Route::post('sign-table/', 'Admin\Sign\TableController@store')->name('sign-table.store');
    Route::get('sign-table/{signEvent_id}', 'Admin\Sign\TableController@show')->name('sign-table.show');
    Route::get('sign-table/{signEvent_id}/edit', 'Admin\Sign\TableController@edit')->name('sign-table.edit');
    Route::patch('sign-table/{signEvent_id}/', 'Admin\Sign\TableController@update')->name('sign-table.update');
    Route::delete('sign-table/{signEvent_id}/', 'Admin\Sign\TableController@destroy')->name('sign-table.destroy');
    Route::get('sign-table/group/{group_id}', 'Admin\Sign\TableController@group')->name('sign-table.groupShow');

});

Route::group(['prefix' => 'sign'], function () {
    Route::get('/sign-log/{signLog_id}', 'Sign\SignLogController@show')->name('signLog.show')->where('signLog_id', '[0-9]+');
    Route::get('/sign-log/{status}', 'Sign\SignLogController@index')->name('signLog.index');
});