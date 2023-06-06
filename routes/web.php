<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TodolistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todolist', function () {
    return view('todolist.index');
})->middleware(['auth', 'verified'])->name('todolist.index');

Route::get('/gallery', function () {
    return view('gallery.index');
})->middleware(['auth', 'verified'])->name('gallery.index');

Route::get('/gallery/create',[GalleryController::class, 'create']);

Route::post('/gallery/store',[GalleryController::class, 'store'])->name('gallery.store');

Route::get('/todolist/create',[TodolistController::class, 'create'])->name('todolist.create');

Route::post('/todolist/store',[TodolistController::class, 'store'])->name('todolist.store');


Route::get('/todolist/show/{id}',[TodolistController::class, 'show'])->name('todolist.show');

Route::get('/todolist/edit/{id}',[TodolistController::class, 'edit'])->name('todolist.edit');

Route::put('/todolist/update{id}',[TodolistController::class,'update'])->name('todolist.update');

Route::delete('/gallery{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');

Route::delete('/todolist{id}',[TodolistController::class,'destroy'])->name('todolist.destroy');

Route::post('/todolist/{id}/start',[TodolistController::class, 'start'])->name('todolist.start');

Route::post('/todolist/{id}/end',[TodolistController::class, 'end'])->name('todolist.end');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/gallery',[GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/todolist',[TodolistController::class, 'index'])->name('todolist.index');
});

require __DIR__.'/auth.php';
