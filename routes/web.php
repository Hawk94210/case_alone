<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InoteController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use App\Models\Inote;
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

Route::prefix('admin')->group(function () {

    Route::get('/',[LoginController::class,'showLogin'])->name('show.login');

    Route::post('/',[LoginController::class,'login'])->name('login');

    Route::get('register',[LoginController::class,'showRegister'])->name('show.register');

    Route::post('register',[LoginController::class,'register'])->name('register');
});


Route::prefix('home')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/',[HomeController::class,'index'])->name('show.index');

        Route::get('create',[InoteController::class,'create'])->name('show.create');

        Route::post('create',[InoteController::class,'store'])->name('store');

        Route::get('{id}/edit',[InoteController::class,'edit'])->name('show.edit');

        Route::post('{id}/edit',[InoteController::class,'update'])->name('edit');

        Route::get('logout',[LoginController::class,'logout'])->name('log_out');
    });
});

Route::prefix('callback')->group( function(){
    Route::get('login', [LoginController::class, 'loginWithGoogle'])->name('login');
    Route::any('google', [LoginController::class, 'callbackFromGoogle'])->name('google.callback');
});