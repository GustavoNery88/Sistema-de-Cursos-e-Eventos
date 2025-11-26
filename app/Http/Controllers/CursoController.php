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
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'local' => 'nullable|string|max:255',
            'carga_horaria' => 'nullable|integer',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'certificado_frente' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificado_verso' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'coord_nome_cpf_x' => 'nullable|integer',
            'coord_nome_cpf_y' => 'nullable|integer',
            'fonte' => 'nullable|integer',
        ]);

        // Upload frente
        if ($request->hasFile('certificado_frente')) {
            $nomeFrente = time() . '_frente.' . $request->certificado_frente->extension();
            $request->certificado_frente->move(public_path('certificados'), $nomeFrente);
            $data['certificado_frente'] = $nomeFrente;
        }

        // Upload verso
        if ($request->hasFile('certificado_verso')) {
            $nomeVerso = time() . '_verso.' . $request->certificado_verso->extension();
            $request->certificado_verso->move(public_path('certificados'), $nomeVerso);
            $data['certificado_verso'] = $nomeVerso;
        }

        // Salvar no banco de dados de forma segura
        Curso::create($validatedData);

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
        // 1. Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'local' => 'nullable|string|max:255',
            'carga_horaria' => 'nullable|integer',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'certificado_frente' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificado_verso' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'coord_nome_cpf_x' => 'nullable|integer',
            'coord_nome_cpf_y' => 'nullable|integer',
            'fonte' => 'nullable|integer',
        ]);

        // 2. Buscar o curso
        $curso = Curso::findOrFail($id);

        // 3. Atualizar os campos simples
        $curso->nome = $validatedData['nome'];
        $curso->descricao = $validatedData['descricao'];
        $curso->local = $validatedData['local'] ?? null;
        $curso->carga_horaria = $validatedData['carga_horaria'] ?? null;
        $curso->data_inicio = $validatedData['data_inicio'];
        $curso->data_fim = $validatedData['data_fim'];
        $curso->coord_nome_cpf_x = $validatedData['coord_nome_cpf_x'] ?? null;
        $curso->coord_nome_cpf_y = $validatedData['coord_nome_cpf_y'] ?? null;
        $curso->fonte = $validatedData['fonte'] ?? null;

        // 4. Upload da imagem da frente (se foi enviada)
        if ($request->hasFile('certificado_frente')) {
            $frenteNome = time() . '_frente.' . $request->certificado_frente->extension();
            $request->certificado_frente->move(public_path('certificados'), $frenteNome);
            $curso->certificado_frente = $frenteNome;
        }

        // 5. Upload da imagem do verso (se foi enviada)
        if ($request->hasFile('certificado_verso')) {
            $versoNome = time() . '_verso.' . $request->certificado_verso->extension();
            $request->certificado_verso->move(public_path('certificados'), $versoNome);
            $curso->certificado_verso = $versoNome;
        }

        // 6. Salvar no banco
        $curso->save();

        // 7. Redirecionar
        return redirect()
            ->route('home')
            ->with('success', 'Curso atualizado com sucesso!');
    }
}
