<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ValidationController,PostController,TransactionController,ContactController};
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

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/register', function () {
    return view('layouts.register');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('layouts.post');
})->middleware(['auth'])->name('home');


require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    //profil
    Route::get('/profil', function () {
        return view('layouts.profil');
    });

    //post
    Route::post('/post/{id}', [PostController::class, 'update'])->name('update');

    Route::post('/post', [PostController::class, 'store'])->name('store');

    Route::get('/addpost',[PostController::class, 'addviewpost'] )->name('addpost');

    Route::get('/updatepost/{id}', [PostController::class, 'updatepost'])->name('updatepost');

     //contact
    Route::get('/contact',[ContactController::class,'index']);

    //validation
    Route::get('/validation',[ValidationController::class,'validation'] );

    Route::get('/validationclient', function () {
        return view('layouts.validationclient');
    });

    Route::get('/validationreceiver', function () {
        return view('layouts.validationreceiver');
    });

    //transaction
    Route::get('/transactionclient', function () {
        return view('layouts.transactionclient');
    });

    Route::get('/transactionreceiver', function () {
        return view('layouts.transactionreceiver');
    });
    Route::get('/transaction',[TransactionController::class, 'showUserSend']);
    Route::get('/addtransaction/{userId}', [TransactionController::class, 'addtransaction'])->name('addtransaction');
    Route::post('/storeTransaction', [TransactionController::class, 'store'])->name('storeTransaction');
    Route::get('/accepttransaction/{userId}', [TransactionController::class, 'update'])->name('updatetransaction');

});
