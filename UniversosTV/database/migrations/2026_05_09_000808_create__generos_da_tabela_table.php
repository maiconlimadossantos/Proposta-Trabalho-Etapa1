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
        Schema::create('_generos_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->string('icone')->nullable();
            $table->boolean('ativo')->default(true);
            $table->string('cor')->nullable();
            $table->foreignId('perfil_id')->constrained('_perfis_da_tabela')->onDelete('cascade');
            $table->foreignId('flime_id')->constrained('_filmes_da_tabela')->onDelete('cascade');
            $table->foreignId('anime_id')->constrained('_animes_da_tabela')->onDelete('cascade');
            $table->foreignId('novela_id')->constrained('_novelas_da_tabela')->onDelete('cascade');
            $table->foreignId('serie_id')->constrained('_series_da_tabela')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_generos_da_tabela');
    }
};
