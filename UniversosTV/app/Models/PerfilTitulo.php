<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilTitulo extends Model
{
    protected $table = 'perfil_titulos';

    protected $fillable = [
        'perfil_id',
        'anime_id',
        'filme_id',
        'novela_id',
        'serie_id',
        'avaliacao',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
   public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id');
    }

    public function filme()
    {
        return $this->belongsTo(Filme::class, 'filme_id');
    }

    public function novela()
    {
        return $this->belongsTo(Novela::class, 'novela_id');
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

}
