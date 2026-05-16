<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = '_generos_da_tabela';

    protected $fillable = [
        'nome',
        'descricao',
        
    ];

     public function filmes()
    {
        return $this->hasMany(Filme::class, 'genero_id');
    }

    public function animes()
    {
        return $this->hasMany(Anime::class, 'genero_id');
    }

    public function novelas()
    {
        return $this->hasMany(Novela::class, 'genero_id');
    }
}
