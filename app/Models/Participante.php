<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
    ];

    // Um participante tem várias inscrições
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    // Um participante pode estar em vários cursos (através de inscrições)
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'inscricoes');
    }
}

