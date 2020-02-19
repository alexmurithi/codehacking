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

    Route::get('/post/{id}',[
        'as'=>'home.post',
        'uses'=>'AdminPostsController@post'
    ]);

Auth::routes();




Auth::routes();

Route::group(['middleware'=>'admin'],function(){

    Route::resource('/admin/users','AdminUsersController');

    Route::resource('/admin/posts','AdminPostsController');
    Route::resource('/admin/categories','AdminCategoriesController');
    Route::resource('/admin/comments','PostCommentsController');
    Route::resource('/admin/comments/replies','CommentRepliesController');

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

    Route::get('admin/posts',[
        'as'=>'admin.posts',
        'uses'=>'AdminPostsController@index'
    ]);

    Route::get('admin/posts/create',[
        'as'=>'admin.posts.create',
        'uses'=>'AdminPostsController@create'
    ]);

    Route::get('admin/posts/{id}/edit',[
        'as'=>'admin.posts.edit',
        'uses'=>'AdminPostsController@edit'
    ]);

    Route::get('admin/comments/{id}',[
        'as'=>'admin.comments.show',
        'uses'=>'PostCommentsController@show'

    ]);

    Route::get('admin/categories',[
        'as'=>'admin.categories',
        'uses'=>'AdminCategoriesController@index'
    ]);

    Route::get('admin/categories/create',[
        'as'=>'admin.categories.create',
        'uses'=>'AdminCategoriesController@create'
    ]);

    Route::get('admin/categories/{id}/edit',[
        'as'=>'admin.categories.edit',
        'uses'=>'AdminCategoriesController@edit'
    ]);

    Route::get('admin/medias',[
        'as'=>'admin.medias',
        'uses'=>'AdminMediasController@index'
    ]);

    Route::get('admin/comments',[
        'as'=>'admin.comments',
        'uses'=>'PostCommentsController@index'
    ]);



});

// Route::group(['middleware'=>'auth',function(){
//
// }]);

Route::get('/home', 'HomeController@index')->name('home');
