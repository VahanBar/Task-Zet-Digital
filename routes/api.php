<?php

use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\WebStiesController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UsersController::class);
Route::apiResource('posts', PostsController::class);
Route::apiResource('websites', WebStiesController::class);
Route::get('/subscribe', [SubscriptionController::class, 'index']);
Route::post('/subscribe', [SubscriptionController::class, 'store']);
