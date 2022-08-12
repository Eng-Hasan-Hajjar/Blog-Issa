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


Route::get('/', 'BlogController@index');
Route::get('/posts/{post}', 'BlogController@post');
Route::post('/posts/{post}/comment', 'BlogController@comment')->middleware('auth');



/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();


/** */
Route::get('/profile', 'Auth\\ProfileController@index')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/viewGallery', 'ImageController@index');
Route::post('/image2', 'ImageController@post')->name('imageroute2');
Route::delete('/image2/{id}', 'ImageController@destroy');


Route::group(['prefix' => 'website'], function() {
    Route::get('/news', 'BlogController@news');

    Route::get('/about', 'BlogController@about');
    Route::get('/contact', 'BlogController@contact');
    Route::get('/syrianArt', 'BlogController@syrianArt');
    Route::get('/exhibitions', 'BlogController@exhibitions');
    Route::get('/exhibition', 'BlogController@exhibition');

    Route::get('/video', 'BlogController@video');

    Route::get('/viewGallery', 'ImageController@index');

    Route::get('/status', 'BlogController@status');
    Route::get('/blogSingle', 'BlogController@blogSingle');
});
/*** */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::put('/posts/{post}/publish', 'PostController@publish')->middleware('admin')->name('posts.publish');
    Route::put('/posts/{post}/publish2', 'PostController@publish2')->middleware('admin')->name('posts.publish2');
    Route::post('/posts/{post}/publish2', 'PostController@publish2')->middleware('admin')->name('posts.publish2');
    Route::get('/posts/{post}/publish2', 'PostController@publish2')->middleware('admin')->name('posts.publish2');

    
    Route::resource('/posts', 'PostController');

    Route::delete('/posts/{post}/destroy', 'PostController@destroy')->middleware('admin')->name('posts.destroy');
    Route::get('/posts/{post}/destroy', 'PostController@destroy')->middleware('admin')->name('posts.destroy');





    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);

    Route::resource('/videos', 'VideoController');
    //Route::get('/video', 'VideoController@index');

    Route::resource('/users', 'UserController', ['middleware' => 'admin', 'only' => ['index', 'destroy']]);
});



    // Create image upload form
    Route::get('/image-upload', 'FileUploadController@createForm');

    // Store image
    Route::post('/image-upload', 'FileUploadController@fileUpload')->name('imageUpload');
    