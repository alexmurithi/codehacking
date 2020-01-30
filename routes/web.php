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

Route::get('/admin',function(){
  return view('admin.index');

});


Auth::routes();




Auth::routes();

Route::group(['middleware'=>'admin'],function(){

    Route::resource('/admin/users','AdminUsersController');

    Route::get('admin/users',[
        'uses'=>'AdminUsersController@index',
        'as'=>'admin.users.index'
    ]);

    Route::get('admin/users/create',[
        'as'=>'admin.users.create',
        'uses'=>'AdminUsersController@create'
    ]);

    Route::get('admin/users/edit/{id}',[
        'as'=>'admin.users.edit',
        'uses'=>'AdminUsersController@edit'
    ]);


});

Route::get('/home', 'HomeController@index')->name('home');
