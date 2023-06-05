<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/gallery', function () {
    return view('gallery.index');
})->middleware(['auth', 'verified'])->name('gallery.index');

Route::get('/gallery/create',[GalleryController::class, 'create']);

Route::post('/gallery/store',[GalleryController::class, 'store'])->name('gallery.store');

Route::delete('/gallery{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/gallery',[GalleryController::class, 'index'])->name('gallery.index');
});

require __DIR__.'/auth.php';
