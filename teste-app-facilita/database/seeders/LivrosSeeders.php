<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LivrosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Livros')->insert([
            [
                'nome' => 'O poder do hábito',
                'autor' => 'Charles Duhigg',
                'numero_registro' => '01',
            ],
            [
                'nome' => 'A cultura do jejum',
                'autor' => 'Luciano Subirá',
                'numero_registro' => '002',
            ],
            [
                'nome' => 'O poder da ação',
                'autor' => 'Paulo Vieira',
                'numero_registro' => '003',
            ],
            [
                'nome' => 'O poder da autorresponsabilidade',
                'autor' => 'Paulo Vieira',
                'numero_registro' => '004',
            ],
            [
                'nome' => 'pai rico pai pobre',
                'autor' => 'Robert Kiyosaki',
                'numero_registro' => '005',
            ]

        ]);
    }
}
