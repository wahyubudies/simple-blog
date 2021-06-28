<?php

use Illuminate\Support\Facades\Route;

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
    // return abort(503);
});

// Route Post
// Route::name('post.')->group(function(){
//     Route::get('post', [Web\PostController::class, 'index'])->name('index');
//     Route::get('post/create', [Web\PostController::class, 'create'])->name('create');
//     Route::post('post', [Web\PostController::class, 'store'])->name('store');
//     Route::get('post/{id}/edit', [Web\PostController::class, 'edit'])->name('edit');    
//     Route::put('post/{id}', [Web\PostController::class, 'update'])->name('update');
//     Route::delete('post/{id}', [Web\PostController::class, 'destroy'])->name('destroy');
// });
Route::name('post.')->group(function(){
    Route::get('post', 'Web\PostController@index')->name('index');
    Route::get('post/create', 'Web\PostController@create')->name('create');
    Route::post('post', 'Web\PostController@store')->name('store');
    Route::get('post/{id}/edit', 'Web\PostController@edit')->name('edit');    
    Route::put('post/{id}', 'Web\PostController@update')->name('update');
    Route::delete('post/{id}', 'Web\PostController@destroy')->name('destroy');
});
// Route Tag
// Route::namespace('App\Http\Controllers\Web')->name('tag.')->group(function(){
//     Route::get('/tag', [TagController::class, 'index'])->name('index');    
//     Route::get('/tag/create', [TagController::class, 'create'])->name('create');
//     Route::post('/tag', [TagController::class, 'store'])->name('store');
//     Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('edit');
//     Route::put('/tag/{id}',[TagController::class, 'update'])->name('update');
//     Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('destroy');
// });
Route::name('tag.')->group(function(){
    Route::get('tag', 'Web\TagController@index')->name('index');    
    Route::get('tag/create', 'Web\TagController@create')->name('create');
    Route::post('tag', 'Web\TagController@store')->name('store');
    Route::get('tag/{id}/edit', 'Web\TagController@edit')->name('edit');
    Route::put('tag/{id}','Web\TagController@update')->name('update');
    Route::delete('tag/{id}', 'Web\TagController@destroy')->name('destroy');
});
