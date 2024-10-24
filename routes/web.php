<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class);

// AJAX route for marking a todo as complete
Route::post('todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
