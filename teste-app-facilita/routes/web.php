<?php

use App\Http\Controllers\LivrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmprestimoController;
//emprestimos
Route::get('/', [EmprestimoController::class, 'listarEmprestimos'])->name('emprestimos.listar');
Route::get('/emprestimos', [EmprestimoController::class, 'index'])->name('emprestimos.index');
Route::get('/emprestimos/{id}', [EmprestimoController::class, 'edit'])->name('emprestimos.edit');
Route::post('/emprestimos', [EmprestimoController::class, 'store'])->name('emprestimos.store');
Route::put('/emprestimos/{id}', [EmprestimoController::class, 'update'])->name('emprestimos.update');
Route::delete('/emprestimos/{id}', [EmprestimoController::class, 'destroy'])->name('emprestimos.destroy');
//usuarios
Route::get('/cadastro-de-usuario', [UsuarioController::class, 'index'])->name('usuario.create');
Route::get('/lista-de-usuarios', [UsuarioController::class, 'listaDeUsuarios'])->name('usuario.lista');
Route::get('/editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::delete('/delete-usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::post('/cadastrar-usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::put('/atualizar-usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
//livros
Route::get('/cadastro-de-livros', [LivrosController::class,'index'])->name('livro.create');
Route::get('/lista-dos-livros/{id?}', [LivrosController::class, 'listaDosLivros'])->name('livro.lista');
Route::get('/editar-livro/{id}', [LivrosController::class, 'edit'])->name('livro.edit');
Route::delete('/delete-livro/{id}', [LivrosController::class, 'destroy'])->name('livro.destroy');
Route::post('/cadastrar-livro', [LivrosController::class, 'store'])->name('livro.store');
Route::put('/atualizar-livro/{id}', [LivrosController::class, 'update'])->name('livro.update');