<?php

use App\Http\Controllers\Auth\AccessTokenController;
use App\Http\Controllers\Auth\DeleteAccountController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserColorController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('api.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::post('/token', [AccessTokenController::class, 'create']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserColorController::class, 'all'])->name('api.users');
    Route::get('/users/{user}/color', [UserColorController::class, 'colors'])->name('api.users.color');
    Route::patch('/users/{user}/color', [UserColorController::class, 'updateColor'])->name('api.users.color.update');
    Route::delete('/users/me/delete', [DeleteAccountController::class, 'destroy'])->name('api.users.delete');
});

