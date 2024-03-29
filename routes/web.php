<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
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

Route::get('/', function () {
    return view('welcome');
});

#Auth::routes();

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [FormController::class, 'index'])->name('home');
Route::get('/form/create', [FormController::class, 'create']);
Route::post('/form/store', [FormController::class, 'store']);
Route::get('/form/{id}/edit', [FormController::class, 'edit']);
Route::put('/form/{id}', [FormController::class, 'update']);
Route::delete('/form/{id}', [FormController::class, 'destroy']);