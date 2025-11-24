<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Curso;

class ParticipanteController extends Controller
{
    // Exibe o formulário para cadastrar um novo participante
    public function create()
    {
        $cursos = Curso::all();
        return view('participantes.create', compact('cursos'));
    }

    // Exibe os detalhes de um participante específico
    public function show($id)
    {
        $curso = Curso::with('participantes')->findOrFail($id);
        return view('participantes.show', compact('curso'));
    }

    // Armazena um novo participante no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados recebidos do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'cpf' => 'required|string|max:14',
            'cursos' => 'required|exists:cursos,id'
        ]);

        // Obtém o ID do curso selecionado
        $cursoId = $request->input('cursos');

        // Verifica se o participante já existe
        $participante = Participante::where('cpf', $validatedData['cpf'])->first();

        if (!$participante) {
            // Cria novo participante
            $participante = Participante::create([
                'nome' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'cpf' => $validatedData['cpf']
            ]);
        }

        // Verifica se já está inscrito no curso
        if ($participante->cursos->contains($cursoId)) {
            return redirect()->route('participantes.create')->with('error', 'Participante já está inscrito neste curso.');
        }

        // Inscreve no curso
        $participante->cursos()->attach($cursoId);

        return redirect()->route('participantes.create')->with('success', 'Inscrição realizada com sucesso!');
    }
}
