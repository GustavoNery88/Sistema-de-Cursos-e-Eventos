<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificadoController extends Controller
{
    public function index()
    {
        return view('certificados.buscar');
    }

    // Busca certificado pelo CPF
    public function show(Request $request)
    {
        $cpf = $request->input('cpf'); // pega o CPF enviado pelo form

        $participante = Participante::where('cpf', $cpf)->with('cursos')->first();

        if (!$participante) {
            return redirect()->back()->with('error', 'CPF não encontrado.');
        }

        $certificados = $participante->cursos;

        return view('certificados.ListaCertificados', compact('certificados', 'participante'));
    }

    public function download($cursoId, $participanteId)
    {
        $curso = Curso::findOrFail($cursoId);
        $participante = Participante::findOrFail($participanteId);

        $pdf = Pdf::loadView('certificados.modelo', ['curso' => $curso, 'participante' => $participante])->setPaper('A4', 'landscape');

        return $pdf->download("certificado-{$participante->nome}.pdf");
    }
}
