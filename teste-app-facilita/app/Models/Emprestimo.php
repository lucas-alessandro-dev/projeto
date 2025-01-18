<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Livros;



class Emprestimo extends Model
{

    protected $table = 'emprestimos';

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
        'status',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livros::class);
    }

    public function genero()
    {
        return $this->hasOneThrough(Genero::class, Livros::class, 'id', 'id', 'livro_id', 'genero_id');
    }
}