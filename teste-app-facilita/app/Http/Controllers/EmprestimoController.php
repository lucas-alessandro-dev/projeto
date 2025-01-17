<?php

namespace App\Http\Controllers;

use App\Models\{Emprestimo, Livros, Usuario};
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
        $emprestimo = Emprestimo::create($request->all());
        return redirect()->route("emprestimos.listar")->with("success","Emprestimo cadastrado com sucesso!");
    }

    
    public function edit($id){
        $emprestimo = Emprestimo::findOrFail($id);
        $usuarios = Usuario::all();
        $livros = Livros::all();
     
        return view("emprestimo.editar-emprestimo", compact("emprestimo", "usuarios", "livros"));
    }

   
    public function update(Request $request, $id) {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->update($request->all());
        return redirect()->route("emprestimos.edit", $id)->with("success","Emprestimo atualizado com sucesso!");
    }

    public function destroy($id) {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->delete();
        return redirect()->route("emprestimos.lista", $id)->with("success","Emprestimo excluído com sucesso!");
    }

    public function listarEmprestimos() {
        $emprestimos = Emprestimo::all();
        $this->atualizarStatus();
        return view("emprestimo.listar-emprestimos", compact("emprestimos"));
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
