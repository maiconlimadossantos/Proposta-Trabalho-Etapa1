<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
});