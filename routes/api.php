<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController,UserController,DescriptionController,RoleController, TransactionController, ValidationController};


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/description', DescriptionController::class);

Route::resource('/role',RoleController::class);

Route::resource('/validation',ValidationController::class);



Route::resource('/transaction',TransactionController::class);
//user
Route::resource('/user',UserController::class);

//post
Route::resource('/post',PostController::class);

