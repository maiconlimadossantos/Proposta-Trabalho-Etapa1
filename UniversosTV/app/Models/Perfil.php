<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = '_perfis_da_tabela';

    protected $fillable = [
        'nome',
        'user_id',
        'avatar',
        'is_infantil',
    ];

     public function usuarios()
    {
        return $this->hasMany(User::class, 'perfil_id');
    }
}
