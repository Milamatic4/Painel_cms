<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmtpEmail extends Model
{
    protected $table = 'smtp_emails';

    protected $fillable = [
        'smtp',
        'email',
        'senha',
        'porta',
    ];
}
