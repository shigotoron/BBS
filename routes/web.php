<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // 追記

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // 追記ここから
    Route::get('/create', function () {
        return view('create');
    })->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    // 追記ここまで
});
