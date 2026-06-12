<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\NovelaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PerfilTituloController;

// Rotas de Autenticação (Página de Login)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas Protegidas do Sistema
Route::middleware('auth')->group(function () {
    // Página Inicial com Perfil, Barra Escondida e Imagens do Conteúdo
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD de Usuários (Gera automaticamente rotas para: Listagem, Adicionar, Editar e Remover)
    Route::resource('users', UserController::class);

    // CRUD de Gêneros (2. LINHA ADICIONADA: Cria dinamicamente as rotas genders.index, create, store, edit, update, destroy)
    Route::resource('genero', GeneroController::class);

    //CRUD de Anime (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('anime', AnimeController::class);

    //CRUD de Filme (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('filme', FilmeController::class);
    //CRUD de Série (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('serie', SerieController::class);
   //CRUD de Novela (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('novela', NovelaController::class);

    //CRUD de Perfil (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('perfil', PerfilController::class);

    //CRUD de Perfil titulo (2. LINHA ADICIONADA: Cria dinamicamente as rotas contents.index, create, store, edit, update, destroy)
    Route::resource('perfil-titulo', PerfilTituloController::class);
});