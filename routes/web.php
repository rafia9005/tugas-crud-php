<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get("/login", [AuthController::class, 'showLogin']);
Route::get("/logout", [AuthController::class, 'logout']);
Route::post("/login", [AuthController::class, 'login'])->name("login");

Route::middleware("auth")->group(function () {
    Route::get("/", [DashboardController::class, 'index'])->name("dashboard");
    Route::post("/create/user", [UserController::class, 'create'])->name("users.create");
    Route::get("/delete/{id}", [UserController::class, 'delete'])->name("users.delete");
    Route::get("/edit/{id}", [UserController::class, 'showedit'])->name("users.edit");
    Route::put("/update/user/{id}", [UserController::class, 'update'])->name("users.update");

});