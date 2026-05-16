<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = '_series_da_tabela';

    protected $fillable = [
        'titulo',
        'descricao',
        'diretor',
        'ano_lancamento',
        'genero_id',
        'duracao',
        'legendado',
        'dublado',
        'disponivel',
        'capa',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }
}
