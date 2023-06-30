<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group([
    'prefix' => "users",
    'middleware' => ['auth']
], function(){
    Route::get('/', [UserController::class, 'index'])->name("users.index");
    Route::post('/store', [UserController::class, 'store'])->name("users.post");
    Route::get('/destroy/{id?}', [UserController::class, 'destroy'])->name("users.destroy");
    Route::get('/logout', [AuthController::class, 'logOut'])->name("auth.logout");
});


Route::group([
    'prefix' => "/",
    'middleware' => ['guest']
], function(){
    Route::get('/', [AuthController::class, 'index'])->name("login");
    Route::post('/login', [AuthController::class, 'auth'])->name("auth.post");

});
