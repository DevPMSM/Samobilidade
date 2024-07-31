<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\LegislacaoController;

//rotas de noticias
Route::middleware(['auth'])->group(function () {
    Route::get('/noticiario', [NoticiaController::class, 'noticiario'])->name('noticiario');
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
    Route::get('/noticia/create', [NoticiaController::class, 'create'])->name('create_noticia');
    Route::get('/noticia/{noticias}', [NoticiaController::class, 'show'])->name('mostrar_noticia');
    Route::get('/noticia/{noticias}/edit', [NoticiaController::class, 'edit'])->name('editar_noticia');
    Route::post('/noticia', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::put('/noticia/{noticias}', [NoticiaController::class, 'update'])->name('noticia.update');
    Route::delete('/noticia/{noticias}', [NoticiaController::class, 'destroy'])->name('noticia_destroy');
});

//rotas de legislacao
Route::middleware(['auth'])->group(function () {
    Route::get('/legislacoes', [LegislacaoController::class, 'index'])->name('legislacoes');
    Route::get('/legislacao/create', [LegislacaoController::class, 'create'])->name('create_legislacao');
    Route::get('/legislacao/{legislacoes}', [LegislacaoController::class, 'show'])->name('mostrar_legislacao');
    Route::get('/legislacao/{legislacoes}/edit', [LegislacaoController::class, 'edit'])->name('editar_legislacao');
    Route::post('/legislacao', [LegislacaoController::class, 'store'])->name('legislacoes.store');
    Route::put('/legislacao/{legislacoes}', [LegislacaoController::class, 'update'])->name('legislacao.update');
    Route::delete('/legislacao/{legislacoes}', [LegislacaoController::class, 'destroy'])->name('legislacao_destroy');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    return view('dashboard', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
