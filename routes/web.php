<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\UsuarioController;

// Rotas públicas
Route::get('/', [CursoController::class, 'index'])->name('home');
Route::get('/usuarios/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/usuarios/login', [UsuarioController::class, 'autenticar'])->name('usuarios.autenticar');
Route::get('/usuarios/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');


// Rotas restritas para usuários autenticados
Route::middleware('auth')->group(function () {
    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos/create', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');
    Route::get('/cursos/edit/{id}', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/edit/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::get('/usuarios/cadastrar', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/cadastrar', [UsuarioController::class, 'store'])->name('usuarios.store');
});