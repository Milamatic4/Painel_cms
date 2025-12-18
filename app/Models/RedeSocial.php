<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
   protected $table = 'rede_socials';

    protected $fillable = [
        'icone',
        'nome',
        'link',
        'tipo',
        'usuario',
    ];
}
