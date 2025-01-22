<?php

use App\Http\Controllers\LivrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LoginController;

Route::controller(LoginController::class)->group(function () {

});

//emprestimos
Route::get('/', [EmprestimoController::class, 'listarEmprestimos'])->name('emprestimos.listar');
Route::get('/emprestimos', [EmprestimoController::class, 'index'])->name('emprestimos.index');
Route::get('/emprestimos/{id}', [EmprestimoController::class, 'edit'])->name('emprestimos.edit');
Route::post('/emprestimos', [EmprestimoController::class, 'store'])->name('emprestimos.store');
Route::put('/emprestimos/{id}', [EmprestimoController::class, 'update'])->name('emprestimos.update');
Route::delete('/emprestimos/{id}', [EmprestimoController::class, 'destroy'])->name('emprestimos.destroy');
//usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuario.create');
Route::get('/usuarios/lista', [UsuarioController::class, 'listaDeUsuarios'])->name('usuario.lista');
Route::get('/usuarios/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuario.store');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
//livros
Route::get('/livros', [LivrosController::class,'index'])->name('livro.create');
Route::get('/livros/lista/{id?}', [LivrosController::class, 'listaDosLivros'])->name('livro.lista');
Route::get('/livros/{id}', [LivrosController::class, 'edit'])->name('livro.edit');
Route::delete('/livros/{id}', [LivrosController::class, 'destroy'])->name('livro.destroy');
Route::post('/livros', [LivrosController::class, 'store'])->name('livro.store');
Route::put('/livros/{id}', [LivrosController::class, 'update'])->name('livro.update');