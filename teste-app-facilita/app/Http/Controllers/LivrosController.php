<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livros;

class LivrosController extends Controller
{
    public function index()
    {
        return view('livro.create-livro');
    }

    public function store(Request $request) {
        try {
            Livros::create(['nome' => $request->nome, 'autor' => $request->autor, 'numero_registro' => $request->numero_registro]);
        } catch (\Exception $e) {
            return redirect('cadastro-de-livros')->with('error','Erro ao cadastrar livro!');
        }

        return redirect()->route('livro.lista')->with('success','Livro cadastrado com sucesso!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome'=> 'required|string|max:255',
            'autor'=> 'required|string|max:255',
            'numero_registro'=> 'required|string|max:255'
        ]);
        Livros::findOrFail($id)->update(['nome'=> $request->nome, 'autor'=> $request->autor, 'numero_registro'=> $request->numero_registro]);
        return redirect()->route('livro.edit', $id)->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id) {
        Livros::destroy($id);
        return redirect()->route('livro.lista')->with('success', 'Livro excluído com sucesso!');
    }

    public function show($id) {
        Livros::find($id);
        return view('livro.editar-livro', compact('livro'));   
    }

    public function edit($id) {
        $livro = Livros::find($id);
        return view('livro.editar-livro', compact('livro'))->with('success', 'Livro atualizado com sucesso!');
    }

    public function listaDosLivros() {
        $livros = Livros::all();
        return view('livro.lista-dos-livros', ['livros' => $livros]);
    }
}
