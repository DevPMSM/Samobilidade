<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

//rotas de noticias
Route::middleware(['auth'])->group(function () {
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
    Route::get('/noticia/create', [NoticiaController::class, 'create'])->name('create_noticia');
    Route::get('/noticia/{noticias}', [NoticiaController::class, 'show'])->name('mostrar_noticia');
    Route::get('/noticia/{noticias}/edit', [NoticiaController::class, 'edit'])->name('editar_noticia');
    Route::post('/noticia', [NoticiaController::class, 'store'])->name('noticia.store');
    Route::put('/noticia/{noticias}', [NoticiaController::class, 'update'])->name('noticia.update');
    Route::delete('/noticia/{noticias}', [NoticiaController::class, 'destroy'])->name('noticia.destroy');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
