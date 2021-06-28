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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Tag
Route::name('tag.')->group(function(){
    Route::get('tag', 'Api\TagController@index')->name('index');        
    Route::post('tag', 'Api\TagController@store')->name('store');    
    Route::put('tag/{id}','Api\TagController@update')->name('update');
    Route::delete('tag/{id}', 'Api\TagController@destroy')->name('destroy');
});
// Route Category
Route::name('category.')->group(function(){
    Route::get('category', 'Api\CategoryController@index')->name('index');        
    Route::post('category', 'Api\CategoryController@store')->name('store');    
    Route::put('category/{id}','Api\CategoryController@update')->name('update');
    Route::delete('category/{id}', 'Api\CategoryController@destroy')->name('destroy');
});