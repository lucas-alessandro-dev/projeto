<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Livros, Genero};

class LivrosController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('livro.create-livro', ['generos'=> $generos]);
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'autor' => 'required|string|max:255',
                'numero_registro' => 'required|integer|unique:livros,numero_registro',
                'situacao' => 'required|string|max:255',
                'genero_id' => 'required|exists:generos,id'
            ]);

            Livros::create($validatedData);
            
            return redirect()->route('livro.lista')->with('success','Livro cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect('cadastro-de-livros')->with('error','Erro ao cadastrar livro!');
        }
    }

    public function update(Request $request, $id) {
        try {
            if (Livros::where('numero_registro', $request->numero_registro)->where('id', '!=', $id)->exists()) {
                return redirect()->route('livro.edit', $id)->with('error', 'Número de registro já existe!')->with('refresh', true);
            }

            Livros::findOrFail($id)->update($request->all());
            return redirect()->route('livro.edit', $id)->with('success', 'Livro atualizado com sucesso!')->with('refresh', true);
        } catch (\Exception $e) {
            return redirect()->route('livro.edit', $id)->with('error', 'Erro ao atualizar livro!')->with('refresh', true);
        }
    }

    public function destroy($id) {
        Livros::destroy($id);
        return redirect()->route('livro.lista')->with('success', 'Livro excluído com sucesso!');
    }

    public function edit($id) {
        $livro = Livros::find($id);
        return view('livro.editar-livro', compact('livro'))->with('success', 'Livro atualizado com sucesso!');
    }

    public function listaDosLivros(Request $request) {
        $generos = Genero::all();
        $generoId = $request ? $request->input('genero') : null;

        if ($generoId) {
            $livros = Livros::leftJoin('generos', 'livros.genero_id', '=', 'generos.id')
                            ->select('livros.*', 'generos.nome as genero_nome')
                            ->where('genero_id', $generoId)
                            ->get();
        } else {
            $livros = Livros::leftJoin('generos', 'livros.genero_id', '=', 'generos.id')
                            ->select('livros.*', 'generos.nome as genero_nome')
                            ->get();
        }

        return view('livro.lista-dos-livros', compact('livros', 'generos', 'generoId'));
    }
}
