<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Usuario, Livros};


class UsuarioController extends Controller
{
    public function index() {
        return view('usuario.create-usuario');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'email' => 'required|email|unique:usuarios,email',
                'numero_cadastro' => 'required|string|unique:usuarios,numero_cadastro'
            ]);
            Usuario::create($request->only(['nome', 'email', 'numero_cadastro']));
            return redirect()->route('usuario.lista')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuario.create')->with('error', 'Erro ao cadastrar usuário!');
        }
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        return view('usuario.editar-usuario', compact('usuario'));
    }

    public function update(Request $request, $id){
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'email' => "required|email|unique:usuarios,email,{$id}",
                'numero_cadastro' => "required|integer|unique:usuarios,numero_cadastro,{$id}"
            ]);

            Usuario::findOrFail($id)->update($request->only(['nome','email','numero_cadastro']));
            return redirect()->route('usuario.edit', $id)->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuario.edit', $id)->with('error', 'Erro ao atualizar usuário!');
        }
    }

    public function destroy($id) {
        try {
            $usuario = Usuario::find($id);
            $usuario->delete();
            return redirect()->route('usuario.lista')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuario.lista')->with('error', 'Erro ao excluir usuário!');
        }
    }

    public function listaDeUsuarios() {
        $usuarios = Usuario::all();
        return view('usuario.lista-de-usuarios', ['usuarios' => $usuarios]);
    }
}
