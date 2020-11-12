<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
Route::post('logout', 'API\RegisterController@logout');

// Route::apiResource('/products','ProductController');

// Route::apiResource('/product', 'ProdukController');

Route::post('/product/store', 'ProdukController@store');
Route::get('/product', 'ProdukController@index');
Route::get('/product/show/{id}', 'ProdukController@show');
Route::post('/product/update/{id}', 'ProdukController@update');
Route::get('/product/delete/{id}', 'ProdukController@delete');

// Route::group(['prefix' => 'products'],function(){

// Route::apiResource('/{product}/reviews','ReviewController');

// });

// Route::apiResource('books', 'BookController');
// Route::post('books/{book}/ratings', 'RatingController@store');

// Route::prefix('v1')->group(function(){
//     Route::post('login', 'Api\AuthController@login');
//     Route::post('register', 'Api\AuthController@register');
//     Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('getUser', 'Api\AuthController@getUser');
//     });
// });

// Route::group(['prefix' => 'v1'], function() {
//     Route::resource('meeting', 'MeetingController', [
//         'except' => ['create', 'edit']
//     ]);

//     Route::resource('meeting/registration', 'RegisController', [
//         'only' => ['store', 'destroy']
//     ]);

//     Route::post('/user/register/', [
//         'uses' => 'AuthController@store'
//     ]);

//     Route::post('/user/signin', [
//         'uses' => 'AuthController@sigin'
//     ]);
// });








// Route::group(array('prefix' => 'api/v1'), function()
// {
//     Route::resource('photos', 'PhotoController');
//     Route::resource('users', 'UserController');
//     Route::resource('categories', 'CategoryController');
// });

// Route::group(array('prefix' => 'api/v1'), function()
// {
//     Route::resource('photos', 'PhotoController');
//     Route::resource('users', 'UserController');
//     Route::resource('categories', 'CategoryController');

// });

// Route::group([
//     'namespace' => 'v1',
//     'prefix' => 'v1'
//     ], function() {
//     Route::post('/posts, 'PostsController@create');
//     Route::get('/posts', 'PostsController@list');
//     Route::get('/posts/{uuid}', 'PostsController@get')->middleware('uuid.validate');
//     Route::put('/posts/{uuid}', 'PostsController@update')->middleware('uuid.validate');
//     });
//     });


// Route::prefix('v1')->group(function () {
//     Route::post('register', 'API\RegisterController@register');
//     Route::post('login', 'API\RegisterController@login');

//     Route::middleware('auth:api')->group(function () {
//     Route::post('logout', 'API\RegisterController@logout');
//     Route::get('show', 'API\UserController@show');
//     Route::resource('products', 'API\ProductController');

//     });
//     });

