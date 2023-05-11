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

Route::get('/adminHome', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.index')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index')->middleware('is_admin');
