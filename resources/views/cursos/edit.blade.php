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
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
