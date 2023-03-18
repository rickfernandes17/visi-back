<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function regras()
    {
        return $this->belongsToMany(Regra::class);
    }
}
