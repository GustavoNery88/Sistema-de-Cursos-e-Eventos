<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;

class CertificadoController extends Controller
{
    public function index(){
        return view('certificados.buscar');
    }
    // Busca certificado pelo CPF
    public function show($cpf){
        $participanteId = Participante::where('cpf', $cpf)->value('id');
    }
}

