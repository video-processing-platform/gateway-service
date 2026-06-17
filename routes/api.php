<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('auth')
    ->as('auth.')
    ->group(function ($router) {
        $router->post('register', [AuthController::class, 'register'])->name('register');
        $router->post('login', [AuthController::class, 'login'])->name('login');
    });

Route::middleware('auth:sanctum')
    ->as('api.')
    ->group(function ($router) {
        $router->get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

        $router->get('user/profile', [UserController::class, 'profile'])->name('user.profile');
        $router->put('user/update', [UserController::class, 'update'])->name('user.update');

        $router->apiResource('video', VideoController::class)->except('update');
    });
