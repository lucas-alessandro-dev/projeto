<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $table = "livros";

    protected $fillable = [
        "nome", 
        "autor", 
        "numero_registro",
        "situacao",
        "genero_id",
    ];

    public function genero() {
        return $this->belongsTo(Genero::class);
    }
}
