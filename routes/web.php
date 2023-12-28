<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EmailController,RoleController,ValidationController,PostController,TransactionController,ContactController,UserController};


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

Route::get('/', [PostController::class, 'home'])->middleware(['auth'])->name('home');


require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    //profil
    Route::get('/profilUser', [PostController::class, 'profil'])->name('profil');
    Route::get('/profilAgencier/{id}', [PostController::class, 'profilAgencier'])->name('profilAgencier');

    //post
    Route::post('/post/{id}', [PostController::class, 'update'])->name('update');

    Route::post('/post', [PostController::class, 'store'])->name('store');

    Route::get('/addpost',[PostController::class, 'addviewpost'] )->name('addpost');

    Route::get('/updatepost/{id}', [PostController::class, 'updatepost'])->name('updatepost');
    Route::get('/deletepost/{id}', [PostController::class, 'destroy'])->name('destroy');
    Route::get('/destroyact/{id}', [PostController::class, 'destroyact'])->name('destroyact');


     //contact
    Route::get('/contact',[ContactController::class,'index']);
    Route::get('/deletecontact/{id}',[ContactController::class,'destroy'])->name('destroy');
    Route::get('/contact/{id}',[ContactController::class,'store'])->name('addcontact');
    Route::get('/contactshow',[ContactController::class,'contactByUser'])->name('contactshow');
    Route::get('/userofapplication',[ContactController::class,'userOfApplication'])->name('userOfApplication');
    Route::get('/contactsearch',[ContactController::class,'contactsearch'])->name('contactsearch');

    //validation
    Route::get('/validation',[ValidationController::class,'validation'] )->name('validation');
    Route::get('/validationByUser/{idUser}',[ValidationController::class,'validationByUser'] )->name('validationByUser');

    Route::get('/noteTransaction/{nameUser}/{id}',[ValidationController::class,'noteTransaction'] );


    Route::get('/validationclient', function () {
        return view('layouts.validationclient');
    });

    Route::get('/validationreceiver', function () {
        return view('layouts.validationreceiver');
    });

    //transaction
    Route::get('/transactionclient',[TransactionController::class, 'transactionclient'])->name('transactionclient');
    Route::get('/transactionreceiver',[TransactionController::class, 'transactionreceiver'])->name('transactionreceiver');
    Route::get('/transaction', [TransactionController::class, 'transactionclient'])->name('transaction');
    Route::get('/addtransaction/{userId}', [TransactionController::class, 'addtransaction'])->name('addtransaction');
    Route::post('/storeTransaction', [TransactionController::class, 'store'])->name('storeTransaction');
    Route::get('/accepttransaction/{userId}', [TransactionController::class, 'update'])->name('updatetransaction');
    Route::get('/annuler/{id}', [TransactionController::class, 'destroy'])->name('annuler');


    //role
    Route::get('/roleshow',[RoleController::class, 'index'])->name('roleshow');

    //user
    Route::get('/gottoprofil', [UserController::class, 'gottoprofil'])->name('gottoprofil');
    Route::post('/updateprofil', [UserController::class, 'updateprofil'])->name('updateprofil');


});

//send email

Route::get('/email/{userId}', [EmailController::class, 'sendEmailRegister']);
Route::get('/sendEmailAccepterTransaction', [EmailController::class, 'sendEmailAccepterTransaction']);
