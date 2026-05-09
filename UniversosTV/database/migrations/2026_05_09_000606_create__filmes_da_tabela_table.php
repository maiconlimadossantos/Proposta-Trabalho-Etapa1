<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_filmes_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->string('diretor');
            $table->integer('ano_lancamento');
            $table->times('duracao');
            $table->boolean('legendado')->default(false);
            $table->boolean('dublado')->default(false);
            $table->boolean('disponivel')->(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_filmes_da_tabela');
    }
};
