<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\Admin\UserController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users', UserController::class, 'index')->name('admin.users.index');
Route::get('/users/edit/{user}', UserController::class, 'edit')->name('admin.users.edit');
Route::get('/apprentices', [ApprenticeController::class, 'index'])->name('admin.apprentices.index');
Route::get('/apprentices/add', [ApprenticeController::class, 'getapprenticeadd'])->name('admin.apprentice.add');
Route::post('/apprentices/add', [ApprenticeController::class, 'postapprenticeadd'])->name('admin.apprentice.add');
Route::get('/apprentices/edit/{id}', [ApprenticeController::class, 'getapprenticeedit'])->name('admin.apprentice.edit');
Route::post('/apprentices/edit/{id}', [ApprenticeController::class, 'postapprenticeedit'])->name('admin.apprentice.edit');
Route::get('/apprentices/delete/{id}', [ApprenticeController::class, 'getapprenticedelete'])->name('admin.apprentice.delete');