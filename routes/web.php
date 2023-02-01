<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::post('/todo', [TodoController::class, 'store']);
Route::get('/todo/edit/{todo}', [TodoController::class, 'edit']);
Route::delete('/todo/{todo}', [Todocontroller::class, 'destroy']);
Route::patch('/todo/{todo}', [TodoController::class, 'update']);
Route::patch('/todo/{todo}/completed', [TodoController::class, 'completed']);

//tags
Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
Route::post('/tags', [TagController::class, 'store']);
Route::delete('/tags/{tag}', [TagController::class, 'destroy']);
Route::get('/tags/edit/{tag}', [TagController::class, 'edit']);
