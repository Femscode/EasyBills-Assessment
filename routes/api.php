<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//authentication route
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



// User Management Route (Can be accessed with and without authentication)
Route::apiResource('users', UserController::class);

//Transaction Management Route (User must be authenticated using a Bearer Token generated from the login/register api)
Route::middleware(['auth:sanctum'])->apiResource('transactions', TransactionController::class);
