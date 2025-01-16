<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/cadastro-de-usuario', [UsuarioController::class, 'index'])->name('usuario.create');
Route::get('/lista-de-usuarios', [UsuarioController::class, 'listaDeUsuarios']);
Route::get('/editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');

Route::get('', [UsuarioController::class,''])->name('');

Route::delete('/delete-usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

Route::post('/cadastrar-usuario', [UsuarioController::class, 'store'])->name('usuario.store');

Route::put('/atualizar-usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');