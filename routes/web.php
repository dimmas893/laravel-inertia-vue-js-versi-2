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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

// Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);
Route::put('/posts/{id}', [\App\Http\Controllers\PostController::class, 'update']);
Route::delete('/posts/{id}', [\App\Http\Controllers\PostController::class, 'destroy']);
Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit']);


// Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store']);
Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/products/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit']);



//route index register
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index']);

//route store register
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

//route store login
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);

//route logout
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->middleware('auth');
