<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'home'])->name("home");
Route::get('/add-post', [PostController::class, 'addPost'])->name("post.add");
Route::get('/view-post', [PostController::class, 'viewPost'])->name("post.view");
Route::post('/store-post', [PostController::class, 'storePost'])->name("post.store");
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name("post.edit");
Route::delete('/delete-post/{id}', [PostController::class, 'deletePost'])->name("post.delete");
Route::put('/update-post/{id}', [PostController::class, 'updatePost'])->name("post.update");
