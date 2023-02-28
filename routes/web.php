<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProjectController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.home');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


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
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit']);
    Route::patch('/tags/{tag}', [TagController::class, 'update']);

   //project
   Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
   Route::post('/projects', [ProjectController::class, 'store']);
   Route::get('/projects/edit/{project}', [ProjectController::class, 'edit']);
   Route::delete('/projects/{project}', [Projectcontroller::class, 'destroy']);
   Route::patch('/projects/{project}', [ProjectController::class, 'update']);
//    Route::patch('/projects/{project}/completed', [ProjectController::class, 'completed']);


});







require __DIR__ . '/auth.php';
