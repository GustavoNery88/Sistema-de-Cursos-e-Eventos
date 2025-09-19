<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscricao extends Model
{

     use HasFactory;

    protected $fillable = ['nome', 'cpf', 'email'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'inscricoes');
    }

    // Cada inscrição pertence a um participante
    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    // Cada inscrição pertence a um curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
