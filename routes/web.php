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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/desc', [App\Http\Controllers\HomeController::class, 'desc'])->name('desc');
Route::get('/home/asc', [App\Http\Controllers\HomeController::class, 'asc'])->name('asc');
Route::get('/search/{Data_search}', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/new_user', [App\Http\Controllers\HomeController::class, 'new_user'])->name('new_user');
Route::post('/new_user', [App\Http\Controllers\HomeController::class, 'new_user_save'])->name('new_user_save');
Route::get('/add', [App\Http\Controllers\HomeController::class, 'add'])->name('add');
Route::post('/add', [App\Http\Controllers\HomeController::class, 'add_save'])->name('add_save');
Route::get('/Average', [App\Http\Controllers\HomeController::class, 'average'])->name('Average');