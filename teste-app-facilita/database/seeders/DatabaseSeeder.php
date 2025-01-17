<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['nome' => 'Carlos Silva', 'email' => 'carlos@example.com', 'numero_cadastro' => '111111', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Fernanda Oliveira', 'email' => 'fernanda@example.com', 'numero_cadastro' => '222222', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Mariana Souza', 'email' => 'mariana@example.com', 'numero_cadastro' => '333333', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Ricardo Pereira', 'email' => 'ricardo@example.com', 'numero_cadastro' => '444444', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Ana Costa', 'email' => 'ana@example.com', 'numero_cadastro' => '555555', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('generos')->insert([
            ['nome' => 'Ficção', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Fantasia', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Aventura', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('livros')->insert([
            ['nome' => 'Livro Exemplo', 'autor' => 'Autor Exemplo', 'numero_registro' => '654321', 'situacao' => 'disponivel', 'genero_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'O poder do hábito', 'autor' => 'Charles Duhigg', 'numero_registro' => '001', 'situacao' => 'disponivel', 'genero_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'A cultura do jejum', 'autor' => 'Luciano Subirá', 'numero_registro' => '002', 'situacao' => 'emprestado', 'genero_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'O poder da ação', 'autor' => 'Paulo Vieira', 'numero_registro' => '003', 'situacao' => 'emprestado', 'genero_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'O poder da autorresponsabilidade', 'autor' => 'Paulo Vieira', 'numero_registro' => '004', 'situacao' => 'disponivel', 'genero_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Pai Rico Pai Pobre', 'autor' => 'Robert Kiyosaki', 'numero_registro' => '005', 'situacao' => 'disponivel', 'genero_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('emprestimos')->insert([
            [
                'usuario_id' => 1,
                'livro_id' => 1,
                'data_emprestimo' => now(),
                'data_devolucao' => now()->addDays(14),
                'status' => 'Em Andamento', //ENUM('Atrasado', 'Devolvido', 'Em Andamento')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 1,
                'livro_id' => 2,
                'data_emprestimo' => now(),
                'data_devolucao' => now()->addDays(14),
                'status' => 'Em Andamento', //ENUM('Atrasado', 'Devolvido', 'Em Andamento')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'livro_id' => 3,
                'data_emprestimo' => now(),
                'data_devolucao' => now()->addDays(14),
                'status' => 'Atrasado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'livro_id' => 4,
                'data_emprestimo' => now(),
                'data_devolucao' => now()->addDays(14),
                'status' => 'Devolvido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}