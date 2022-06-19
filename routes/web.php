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


Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => '/admin'], function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/{user}/color', [\App\Http\Controllers\AdminController::class, 'changeColor'])->name('changeColor');
    Route::patch('/{user}/color', [\App\Http\Controllers\AdminController::class, 'changeUserColor'])->name('changeUserColor');
    Route::delete('/{user}/color', [\App\Http\Controllers\AdminController::class, 'deleteUserColor'])->name('deleteUserColor');

});

require __DIR__ . '/auth.php';
