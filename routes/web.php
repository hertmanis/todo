<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Redirect root to todos index
Route::get('/', function () {
    return Auth::check() ? redirect()->route('todos.index') : redirect()->route('login');
});


// Resource routes for todos
Route::resource('todos', TodoController::class);

// AJAX route for marking a todo as complete
Route::post('todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Logout route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
