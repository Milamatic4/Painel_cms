<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'capa', 
        'url',
        'titulo',
        'descricao',
        'video',
        'tags',
        'status',
        'categoria',
        'tipo',
    ];
}
