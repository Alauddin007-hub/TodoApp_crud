<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::get('todo', function () {
//     return view('todo/index');
// });

Route::get('/', [TodoController::class, 'index'])->name('todo.list');
Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('todo', [TodoController::class, 'store'])->name('todo.store');
Route::post('todo/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('todo/delete/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
// Route::get('todos', [TodoController::class, 'index'])->name('todo.list');