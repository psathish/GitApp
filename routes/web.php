<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return "welcome to TaskApp";
});



Route::get('/tasks', function () {
    $tasks = Task::all();
    return view('tasks', ['tasks' => $tasks]);
});

Route::post('/tasks', function () {
    Task::create(['name' => request('name')]);
    return redirect('/tasks');
});

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect('/tasks');
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);