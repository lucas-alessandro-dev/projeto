<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.create-usuario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'numero_cadastro' => 'required|integer|unique:usuarios,numero_cadastro'
        ]);

        Usuario::create($request->only(['nome', 'email', 'numero_cadastro']));
        return redirect('lista-de-usuarios');
    }

    public function show($id) {

    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        return view('usuario.editar-usuario', compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->numero_cadastro = $request->numero_cadastro;
        $usuario->save();
        return redirect('lista-de-usuarios');
    }

    public function destroy($id) {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('lista-de-usuarios');
    }

    public function listaDeUsuarios() {
        $usuarios = Usuario::all();
        return view('usuario.lista-de-usuarios', ['usuarios' => $usuarios]);
    }
}
