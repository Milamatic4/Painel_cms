<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideDestaque extends Model
{
    protected $table = 'slide_destaques';

    protected $fillable = [
        'imagem',
        'titulo_1',
        'titulo_2',
        'link',
        'ordem',
    ];
}