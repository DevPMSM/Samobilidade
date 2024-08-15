<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LegislacaoController;
use App\Http\Controllers\NoticiaController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ROTA PAGINA INICIAL
Route::get('/', function () {
    return view('welcome');
});

// ROTA DASHBOARD DEPOIS DE LOGADO
Route::get('/dashboard', function () {
    $user = Auth::user();
    $users = User::all();

    return view('dashboard', [
        'user' => $user,
        'users' => $users,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        $users = User::all();
    } else {
        $users = collect([$user]);
    }

    return view('dashboard', [
        'user' => $user,
        'users' => $users,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


//rotas de noticias
Route::get('/noticiario', [NoticiaController::class, 'noticiario'])->name('noticiario');
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
Route::get('/noticia/create', [NoticiaController::class, 'create'])->name('create_noticia');
Route::get('/noticia/{noticias}', [NoticiaController::class, 'show'])->name('mostrar_noticia');
Route::get('/noticia/{noticias}/edit', [NoticiaController::class, 'edit'])->name('editar_noticia');
Route::post('/noticia', [NoticiaController::class, 'store'])->name('noticias.store');
Route::put('/noticia/{noticias}', [NoticiaController::class, 'update'])->name('noticia.update');
Route::delete('/noticia/{noticias}', [NoticiaController::class, 'destroy'])->name('noticia_destroy');

Route::middleware(['auth', 'editor'])->group(function () {

});

//rotas de legislacao
Route::get('/legislacoes-index', [LegislacaoController::class, 'index'])->name('legislacoes');
Route::get('/legislacao/create', [LegislacaoController::class, 'create'])->name('create_legislacao');
Route::get('/legislacao/{legislacoes}', [LegislacaoController::class, 'show'])->name('mostrar_legislacao');
Route::get('/legislacao/{legislacoes}/edit', [LegislacaoController::class, 'edit'])->name('editar_legislacao');
Route::post('/legislacao', [LegislacaoController::class, 'store'])->name('legislacoes.store');
Route::put('/legislacao/{legislacoes}', [LegislacaoController::class, 'update'])->name('legislacao.update');
Route::delete('/legislacao/{legislacoes}', [LegislacaoController::class, 'destroy'])->name('legislacao_destroy');

Route::middleware(['auth', 'editor'])->group(function () {
  
});

// Rota admin
Route::get('/admin/users', [AdminController::class, 'index'])->name('users.index')->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/users', [AdminController::class, 'store'])->name('users.store');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
