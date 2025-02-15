<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legislacao extends Model
{
    use HasFactory;
    protected $table = 'legislacoes';
    protected $fillable = [
        'titulo',
        'resumo',
        'url',
    ];
}
