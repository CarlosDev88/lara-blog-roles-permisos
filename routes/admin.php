<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::get('', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

//las rutas de los users
Route::resource('users', UserController::class)->names('admin.users');

//las rutas de los roles
Route::resource('roles', RoleController::class)->names('admin.roles');

//las rutas de categorias
Route::resource('categories', CategoryController::class)->names('admin.categories');

//las rutas de los tags
Route::resource('tags', TagController::class)->names('admin.tags');

//las rutas de los post
Route::resource('posts', PostController::class)->names('admin.posts');

