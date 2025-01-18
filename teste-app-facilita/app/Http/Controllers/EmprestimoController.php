<?php

namespace App\Http\Controllers;

use App\Models\{Emprestimo, Livros, Usuario, Genero};
use Exception;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
   
    public function index() {
        $emprestimos = Emprestimo::all();
        $usuarios = Usuario::all();
        $livros = Livros::all();
    
        return view("emprestimo.create-emprestimo", compact("emprestimos", "usuarios", "livros"));
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                "usuario_id" => "required",
                "livro_id" => "required",
                "data_emprestimo" => "required",
                "data_devolucao" => "required",
            ]);
            Emprestimo::create($validatedData);
    
            return redirect()->route("emprestimos.listar")->with("success","Emprestimo cadastrado com sucesso!");
        } catch (Exception $e) {
            return redirect()->route("emprestimos.listar")->with("error","Erro ao cadastrar emprestimo!");
        }
    }

    
    public function edit($id){
        $emprestimo = Emprestimo::findOrFail($id);
        $usuarios = Usuario::all();
        $livros = Livros::all();
     
        return view("emprestimo.editar-emprestimo", compact("emprestimo", "usuarios", "livros"));
    }

   
    public function update(Request $request, $id) {
        try {
            $emprestimo = Emprestimo::findOrFail($id);
            $emprestimo->update($request->all());
            return redirect()->route("emprestimos.edit", $id)->with("success","Emprestimo atualizado com sucesso!");
        } catch (Exception $e) {
            return redirect()->route("emprestimos.edit", $id)->with("error","Erro ao atualizar emprestimo!");
        }
    }

    public function destroy($id) {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->delete();
        return redirect()->route("emprestimos.listar", $id)->with("success","Emprestimo excluído com sucesso!");
    }

    public function listarEmprestimos(Request $request) {
        $generos = Genero::all();
        $generoId = $request ? $request->input('genero') : null;

        if ($generoId) {
            $emprestimos = Emprestimo::whereHas('livro', function ($query) use ($generoId) {
                $query->where('genero_id', $generoId);
            })->with('usuario', 'livro', 'genero')->get();
        } else {
            $emprestimos = Emprestimo::with('usuario', 'livro', 'genero')->get();
        }
        $this->atualizarStatus();
        return view("emprestimo.listar-emprestimos", compact("emprestimos", "generos"));
    }

    public function atualizarStatus() {
        $emprestimos = Emprestimo::all();
        foreach ($emprestimos as $emprestimo) {
            $dataDevolucao = strtotime($emprestimo->data_devolucao);
            if ($emprestimo->status != "Devolvido" ) {
                $emprestimo->status = ($dataDevolucao < time()) ? 'Atrasado' : 'Em Andamento';
            }
            $emprestimo->save();
        }
    }
  
}
