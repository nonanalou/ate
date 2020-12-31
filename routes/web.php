<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskForceController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//require user authentication for ll private routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Task-Force Routes
    Route::get('/task-forces', [TaskForceController::class, 'index'])->name(('task-forces'));
    Route::get('/task-forces/{taskForce:name}', [TaskForceController::class, 'show'])->name(('task-force'));

    // Projects Routes
    Route::get('/projects', [ProjectController::class, 'index'])->name(('projects'));
    Route::get('/projects/new', [ProjectController::class, 'create'])->name(('new-project'));
    Route::post('/projects', [ProjectController::class, 'store'])->name(('store-project'));
    Route::get('/projects/{project:id}', [ProjectController::class, 'show'])->name(('project'));

    Route::get('/posts/{post:id}', [PostController::class, 'show'])->name(('post'));
    Route::get('/projects/{project:id}/posts/new', [PostController::class, 'create'])->name(('new-post'));
    Route::post('/projects/{project:id}/posts', [PostController::class, 'store'])->name(('store-post'));
});
