<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PerfilTituloController;
use App\Http\Controllers\AnimeController; // Importação adicionada
use App\Http\Controllers\FilmeController; // Importação adicionada
use App\Http\Controllers\SerieController; // Importação adicionada
use App\Http\Controllers\NovelaController; // Importação adicionada

// Rotas de Autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas Protegidas do Sistema
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('profiles', PerfilController::class);
    Route::resource('profile-titles', PerfilTituloController::class);

    // CRUD de Animes adicionado ao escopo protegido
    Route::resource('animes', AnimeController::class);

    //CRUD de Filmes adicionado ao escopo protegido
    Route::resource('filmes', FilmeController::class);

    //CRUD de Séries adicionado ao escopo protegido
    Route::resource('series', SerieController::class);

    //CRUD de Novelas adicionado ao escopo protegido
    Route::resource('novelas', NovelaController::class);
    
});