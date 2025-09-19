<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'local',
        'carga_horaria',
        'data_inicio',
        'data_fim',
        'certificado_frente',
        'certificado_verso',
        'coord_nome_cpf_x',
        'coord_nome_cpf_y',
        'fonte',
    ];


    // Um curso tem várias inscrições
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    // Um curso tem vários participantes (através de inscrições)
    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'inscricoes');
    }
}
