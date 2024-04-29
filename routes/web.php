<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerRegistrationController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDaftarTokoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/edit_profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit_profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.edit');

Route::controller(PartnerRegistrationController::class)->name('registration.')->group(function () {
    Route::get('/registration', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminDashboardController::class)->middleware(['auth', 'admin'])->name('dashboard.')->group(function () {
        Route::get('/dashboard', 'index')->name('index');
        Route::get('/view/{uuid}', 'view')->name('view');
        Route::post('/view/update-status', 'updateStatus')->name('updateStatus');
        Route::post('/view/delete', 'delete')->name('delete');
    });

    Route::controller(AdminDaftarTokoController::class)->middleware(['auth', 'admin'])->name('daftartoko.')->group(function () {
        Route::get('/toko', 'index')->name('index');
        Route::get('/action/{id}', 'action')->name('action');
        Route::post('/status/{id}', 'updateStatus')->name('updateStatus');

    });

    Route::controller(AdminAuthController::class)->name('auth.')->group(function () {
        Route::get('/login', 'index')->middleware('guest')->name('login');
        Route::post('/login/store', 'store')->middleware('guest')->name('store');
        Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    });
});
