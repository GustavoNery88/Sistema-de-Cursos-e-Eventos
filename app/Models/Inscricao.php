<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';

    protected $fillable = [
        'participante_id',
        'curso_id',
    ];

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
