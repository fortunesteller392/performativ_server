<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("/users")->group(function() {
    Route::get("/", [UserController::class, 'getAllUsers']);
    Route::get("/{id}", [UserController::class, 'getUserById']);
    Route::post("/", [UserController::class, 'createUser']);
    Route::put("/{id}", [UserController::class, 'updateUser']);
    Route::delete("/{id}", [UserController::class, 'deleteUser']);
});