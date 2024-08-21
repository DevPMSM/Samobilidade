<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LegislacaoController;
use App\Http\Controllers\NoticiaController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rota Página Inicial
Route::get('/', function () {
    return view('welcome');
});

// Rota da Dashboard após o Login
Route::get('/dashboard', function () {
    $user = Auth::user();
    $users = $user->role === 'admin' ? User::all() : collect([$user]);

    return view('dashboard', [
        'user' => $user,
        'users' => $users,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


//Rotas paras páginas de visitante:
Route::get('/noticias', [NoticiaController::class, 'noticiario'])->name('noticias');


// Grupo de rotas para notícias (apenas para usuários autenticados com o papel de 'editor')
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/noticias-index', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/noticia/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::get('/noticia/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');
    Route::get('/noticia/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::post('/noticia', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::put('/noticia/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::delete('/noticia/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
});

// Grupo de rotas protegidas para legislações (apenas para usuários autenticados com o papel de 'editor')
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/legislacoes', [LegislacaoController::class, 'index'])->name('legislacoes');
    Route::get('/legislacoes/create', [LegislacaoController::class, 'create'])->name('legislacoes.create');
    Route::post('/legislacoes', [LegislacaoController::class, 'store'])->name('legislacoes.store');
    Route::get('/legislacoes/{id}', [LegislacaoController::class, 'show'])->name('legislacoes.show');
    Route::get('/legislacoes/{id}/edit', [LegislacaoController::class, 'edit'])->name('legislacoes.edit');
    Route::put('/legislacoes/{id}', [LegislacaoController::class, 'update'])->name('legislacoes.update');
    Route::delete('/legislacoes/{id}', [LegislacaoController::class, 'destroy'])->name('legislacoes.destroy');
});

// Grupo de rotas protegidas para administração de usuários (apenas para administradores)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
});

// Incluindo as rotas de autenticação geradas pelo Laravel
require __DIR__.'/auth.php';
