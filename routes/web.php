<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
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
    return view('layout.main');
});

Route::get('/groups', [UserGroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [UserGroupController::class, 'create'])->name('groups.create');
Route::post('/groups/store', [UserGroupController::class, 'store'])->name('groups.store');
Route::get('/gropus/{id}/edit', [UserGroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{id}', [UserGroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{id}', [UserGroupController::class, 'destroy'])->name('groups.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

