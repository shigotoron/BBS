<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/post/{post_id}', [PostController::class, 'post'])->name('post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PostController::class, 'show'])->name('dashboard');
    Route::get('/create', function () {
        return view('create');
    })->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/edit/{post_id}', [PostController::class, 'edit'])->name('edit');
    Route::post('/update/{post_id}', [PostController::class, 'update'])->name('update');
    Route::post('/delete/{post_id}', [PostController::class, 'delete'])->name('delete');
    Route::post('/store_comment', [CommentController::class, 'store'])->name('store_comment');
    Route::get('/edit_comment/{comment_id}', [CommentController::class, 'edit'])->name('edit_comment'); // 追記
    Route::post('/update_comment/{comment_id}', [CommentController::class, 'update'])->name('update_comment'); // 追記
});
