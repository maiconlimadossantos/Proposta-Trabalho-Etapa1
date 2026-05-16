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
        Schema::create('_animes_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('estudio');
            $table->integer('ano_lancamento');
            $table->integer('episodios');
            $table->foreignId('genero_id')->constrained('_generos_da_tabela')->onDelete('cascade');
            $table->times('duracao');
            $table->boolean('legendado')->default(false);
            $table->boolean('dublado')->default(false);
            $table->boolean('disponivel')->default(true);
            $table->string('capa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_animes_da_tabela');
    }
};
