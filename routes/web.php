<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Tag;
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
Route::name('post.')->group(function(){
    Route::get('/post', [PostController::class, 'index'])->name('index');
    Route::get('/post/create', [PostController::class, 'create'])->name('create');
    Route::post('/post', [PostController::class, 'store'])->name('store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit');    
    Route::put('/post/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('destroy');
});

// Route Tag
Route::name('tag.')->group(function(){
    Route::get('/tag', [TagController::class, 'index'])->name('index');    
    Route::get('/tag/create', [TagController::class, 'create'])->name('create');
    Route::post('/tag', [TagController::class, 'store'])->name('store');
    Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::put('/tag/{id}',[TagController::class, 'update'])->name('update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('destroy');
});