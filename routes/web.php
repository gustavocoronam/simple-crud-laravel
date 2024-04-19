<?php

use App\Http\Controllers\TasksController;
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
//     return view('tasks.task-index');
// });

Route::get('/', [TasksController::class, 'index'])->name('task.index');

Route::get('/task/edit/{id}', [TasksController::class, 'edit'])->name('task.edit');
Route::get('/task/show/{id}', [TasksController::class, 'show'])->name('task.show');

Route::post('/task', [TasksController::class, 'store'])->name('task.store');

Route::put('/task/update/{id}', [TasksController::class, 'update'])->name('task.update');

Route::delete('/task/delete/{id}', [TasksController::class, 'destroy'])->name('task.delete');

