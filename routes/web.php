<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ParticipanteController;
use Phiki\Phast\Root;

Route::get('/', [CursoController::class, 'index'])->name('home');

Route::get('/usuarios/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/usuarios/login', [UsuarioController::class, 'autenticar'])->name('usuarios.autenticar');
Route::get('/usuarios/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::get('/certificados/buscar', [CertificadoController::class, 'index'])->name('certificados.buscar');
Route::get('/certificados/resultados', [CertificadoController::class, 'show'])->name('certificados.show');


Route::get('/certificados/download/{curso}/{participante}', [CertificadoController::class, 'download'])->name('certificados.download');



Route::middleware('auth')->group(function () {
    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos/create', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');
    Route::get('/cursos/edit/{id}', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/edit/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::get('/usuarios/cadastrar', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/cadastrar', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/participantes/cadastrar', [ParticipanteController::class, 'create'])->name('participantes.create');
    Route::post('/participantes/cadastrar', [ParticipanteController::class, 'store'])->name('participantes.store');
    Route::get('/participantes/{id}', [ParticipanteController::class, 'show'])->name('participantes.show');
});
