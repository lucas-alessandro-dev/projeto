<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'Usuário Admin',
                'email' => 'admin@exemplo.com',
                'numero_cadastro' => 001,
            ],
            [
                'nome' => 'Usuário Teste',
                'email' => 'teste@exemplo.com',
                'numero_cadastro' => 002,
            ],
            [
                'nome' => 'Usuário Um',
                'email' => 'usuarioum@exemplo.com',
                'numero_cadastro' => 003,
            ],
            [
                'nome' => 'Usuário Dois',
                'email' => 'usuariodois@exemplo.com',
                'numero_cadastro' => 004,
            ],
            [
                'nome' => 'Usuário Três',
                'email' => 'usuariotres@exemplo.com',
                'numero_cadastro' => 005,
            ]
        ]);
    }
}
