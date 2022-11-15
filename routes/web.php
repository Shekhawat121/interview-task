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


Route::get('add-slot' , [App\Http\Controllers\SlotController::class , 'create'])->name('add-slot');

Route::post('store-slot' , [App\Http\Controllers\SlotController::class , 'store'])->name('store.slot');

Route::post('get-slot' , [App\Http\Controllers\AppintmentController::class , 'getAppontment'])->name('get.slot');

Route::get('add-appointment' , [App\Http\Controllers\AppintmentController::class , 'create'])->name('add-appointment');

Route::post('store-appointment' , [App\Http\Controllers\AppintmentController::class , 'store'])->name('store.appointment');


