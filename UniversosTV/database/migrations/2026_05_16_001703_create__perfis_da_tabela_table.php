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
        Schema::create('_perfis_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreign('perfil_id')->constrained('_perfiltitulo_da_tabela')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('_planos_da_tabela')->onDelete('cascade');
            $table->string('nome');
            $table->string('avatar')->nullable();
            $table->boolean('is_infatil')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_perfis_da_tabela');
    }
};
