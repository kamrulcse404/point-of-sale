<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::get('/', [LoginController::class, 'home'])->name('dashboard')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/groups', [UserGroupController::class, 'index'])->name('groups.index')->middleware('auth');
Route::get('/groups/create', [UserGroupController::class, 'create'])->name('groups.create')->middleware('auth');
Route::post('/groups/store', [UserGroupController::class, 'store'])->name('groups.store')->middleware('auth');
Route::get('/gropus/{id}/edit', [UserGroupController::class, 'edit'])->name('groups.edit')->middleware('auth');
Route::put('/groups/{id}', [UserGroupController::class, 'update'])->name('groups.update')->middleware('auth');
Route::delete('/groups/{id}', [UserGroupController::class, 'destroy'])->name('groups.destroy')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
