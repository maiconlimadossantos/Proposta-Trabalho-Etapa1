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
        Schema::create('_novelas_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('autor');
            $table->integer('ano_lancamento');
            $table->integer('Capitulos');
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
        Schema::dropIfExists('_novelas_da_tabela');
    }
};
