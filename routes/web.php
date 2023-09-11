<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController};

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
    return view('layouts.post');
});
Route::get('/profil', function () {
    return view('layouts.profil');
});

Route::get('/transaction', function () {
    return view('layouts.transaction');
});
Route::get('/validation', function () {
    return view('layouts.validation');
});
Route::get('/addtransaction', function () {
    return view('layouts.addtransaction');
});

Route::get('/addpost', function () {
    return view('layouts.addpost');
})->name('addpost');
Route::get('/updatepost/{id}', [PostController::class, 'updatepost'])->name('updatepost');

Route::post('/post/{id}', [PostController::class, 'update'])->name('update');

Route::post('/post', [PostController::class, 'store'])->name('store');



Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/register', function () {
    return view('layouts.register');
});
