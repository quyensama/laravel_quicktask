<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'index']);

Route::get('login',[AuthController::class, 'index'])->name('login');

Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');

Route::get('register', [AuthController::class, 'register'])->name('register');

Route::post('custom-register', [AuthController::class, 'customRegister'])->name('register.custom');

Route::get('logout', [AuthController::class, 'logOut'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('index', [PostController::class, 'index'])->name('index');
    Route::get('create', [PostController::class, 'create'])->name('create');
    Route::get('edit', [PostController::class, 'edit'])->name('edit');
    Route::resource('posts', 'PostController');
});
