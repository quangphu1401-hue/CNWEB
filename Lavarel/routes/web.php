<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
Route::get('/', [HomeController::class, "index"])->name('home');
Route::get("posts", [PostController::class, "index"]);
Route::resource('tasks', TaskController::class);