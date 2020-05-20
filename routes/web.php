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

Route::get('inscription', function () {
    return'bonjour monsieur';
})->name('jiren');

Route::get('/', function () {
    return view('welcome');
});

route::get('test', function(){
    return'bonjour monsieur';
 });

 route::get('logout','Auth\LoginController@logout');
 Auth::routes();
 
 Route::get('/home', 'HomeController@index')->name('home');
 
 
 Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('users', 'UsersController');
    
 });

 
 Route::group(['middleware'=>['web']],function(){
     Route::get('blog/{slug}', ["as"=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
     Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex2']);
     Route::get('about','pagesController@getAbout');
     Route::get('contact', 'pagesController@getContact');
     Route::post('contact', 'pagesController@postContact');
     Route::get('/', 'pagesController@getIndex');
     Route::resource('posts','postController');
     Route::post('/store', ["as"=>'store','uses'=>'postController@store']);
     Route::get('/show', ["as"=>'show','uses'=>'postController@show']);
     Route::post('/like', 'postController@postLike')->name('like');

     //categoriees
     Route::resource('categories','CategoryController', ['except' => ['create']]);
     Route::resource('tags','TagController', ['except' => ['create']]);

     //comments
     
     Route::post('comments/{post_id}', ['uses'=>'CommentsController@store', 'as'=> 'comments.store'] );
     Route::get('comments/{id}/edit', ['uses'=>'CommentsController@edit', 'as'=> 'comments.edit'] );
     Route::put('comments/{id}', ['uses'=>'CommentsController@update', 'as'=> 'comments.update'] );
     Route::delete('comments/{id}', ['uses'=>'CommentsController@destroy', 'as'=> 'comments.destroy'] );
     Route::get('comments/{id}/delete', ['uses'=>'CommentsController@delete', 'as'=> 'comments.delete'] );


     // route sur forum


     Route::get('forum','ThreadController@index')->name('thread.index');
     Route::resource('thread','ThreadController')->except(['index']);
            // comment topic
        
        

       
     
     
 });
