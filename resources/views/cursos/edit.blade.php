@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Curso</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('cursos.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input maxlength="160" type="text" class="form-control" id="nome" name="nome"
                        value="{{ old('nome', $curso->nome) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $curso->descricao) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="local" class="form-label">Local</label>
                    <input type="text" class="form-control" id="local" name="local"
                        value="{{ old('local', $curso->local) }}" required>
                </div>

                <div class="mb-3">
                    <label for="carga_horaria" class="form-label">Carga Horária</label>
                    <input type="number" class="form-control" id="carga_horaria" name="carga_horaria"
                        value="{{ old('carga_horaria', $curso->carga_horaria) }}" required>
                </div>

                <div class="mb-3">
                    <label for="data_inicio" class="form-label">Data de Início</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                        value="{{ old('data_inicio', $curso->data_inicio) }}" required>
                </div>

                <div class="mb-3">
                    <label for="data_fim" class="form-label">Data de Fim</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim"
                        value="{{ old('data_fim', $curso->data_fim) }}" required>
                </div>

                <div class="mb-3">
                    <label for="fonte" class="form-label">Fonte</label>
                    <input type="number" class="form-control" id="fonte" name="fonte"
                        value="{{ old('fonte', $curso->fonte) }}" required>
                </div>

                <div class="mb-3">
                    <label for="coord_nome_cpf_x" class="form-label">Coord X Nome + CPF</label>
                    <input type="number" class="form-control" id="coord_nome_cpf_x" name="coord_nome_cpf_x"
                        value="{{ old('coord_nome_cpf_x', $curso->coord_nome_cpf_x) }}" required>
                </div>

                <div class="mb-3">
                    <label for="coord_nome_cpf_y" class="form-label">Coord Y Nome + CPF</label>
                    <input type="number" class="form-control" id="coord_nome_cpf_y" name="coord_nome_cpf_y"
                        value="{{ old('coord_nome_cpf_y', $curso->coord_nome_cpf_y) }}" required>
                </div>

                <div class="mb-3">
                    <label for="certificado_frente" class="form-label">Certificado Frente</label>
                    <input type="file" class="form-control" id="certificado_frente">
                </div>

                <div class="mb-3">
                    <label for="certificado_verso" class="form-label">Certificado Verso</label>
                    <input type="file" class="form-control" id="certificado_verso" name="certificado_verso">
                </div>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
