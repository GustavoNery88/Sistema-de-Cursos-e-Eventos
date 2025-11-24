<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{

    // Imprime a lista de cursos na página inicial
    public function index()
    {
        $cursos = Curso::paginate(6); // exibe 6 cursos por página
        return view('home', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

   // Armazena um novo curso no banco de dados
    public function store(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('certificado_frente')) {
            $data['certificado_frente'] = $request->file('certificado_frente')
                ->store('certificados', 'public');
        }
        if ($request->hasFile('certificado_verso')) {
            $data['certificado_verso'] = $request->file('certificado_verso')
                ->store('certificados', 'public');
        }

        Curso::create($data);

        return redirect()->route('home')->with('success', 'Curso cadastrado com sucesso!');
    }


   // Exibe os detalhes de um curso específico
    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    // Exibe o formulário de edição para um curso específico
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    
    // Atualiza as informações de um curso específico
    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);

        $data = $request->except(['certificado_frente', 'certificado_verso']);

        if ($request->hasFile('certificado_frente')) {
            $data['certificado_frente'] = $request->file('certificado_frente')
                ->store('certificados', 'public');
        } else {
            $data['certificado_frente'] = $curso->certificado_frente;
        }

        if ($request->hasFile('certificado_verso')) {
            $data['certificado_verso'] = $request->file('certificado_verso')
                ->store('certificados', 'public');
        } else {
            $data['certificado_verso'] = $curso->certificado_verso;
        }

        $curso->update($data);

        return redirect()->route('home')->with('success', 'Curso atualizado com sucesso!');
    }
}
