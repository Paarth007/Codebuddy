<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['web'])->group(function () {
    Route::get('/adminHome', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.index');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index');
