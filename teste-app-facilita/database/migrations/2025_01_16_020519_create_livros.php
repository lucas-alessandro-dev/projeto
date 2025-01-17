<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('autor');
            $table->string('numero_registro')->unique();
            $table->enum('situacao', ['emprestado', 'disponivel'])->default('disponivel');
            $table->unsignedBigInteger('genero_id');
            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};