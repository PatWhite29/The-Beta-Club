<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;

Route::get('/',[MainController::class, 'index'])->name('main');
//route::resource('products','ProductController');

Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('boulder',[ProductController::class, 'index'])->name('products.index');

Route::get('boulder/create',[ProductController::class, 'create'])->name('products.create');

Route::post('boulder',[ProductController::class,'store'])->name('products.store');

Route::get('boulder/{product}',[ProductController::class, 'show'])->name('products.show');

Route::get('boulder/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::match(['put','patch'],'boulder/{product}',[ProductController::class, 'update'])->name('products.update');

Route::delete('boulder/{product}',[ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
