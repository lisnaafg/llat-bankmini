<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');  // Show all users

Route::get('/users/create', [UserController::class, 'tambahUser'])->name('users.create');  // Show user creation form
Route::post('/users', [UserController::class, 'simpanUser'])->name('users.store');  // Store new user

Route::get('/users/{id}/hapus', [UserController::class, 'hapusUser'])->name('users.delete');
Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('users.edit');

Route::post('/users/{id}/update', [UserController::class, 'updateUser'])->name('users.update');
