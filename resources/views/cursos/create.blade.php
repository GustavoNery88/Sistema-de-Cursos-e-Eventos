@extends('layouts.app')

@section('title', 'Cadastrar Curso')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Cadastrar Curso</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input maxlength="200" type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="local" class="form-label">Local</label>
                    <input type="text" class="form-control" id="local" name="local" required>
                </div>
                <div class="mb-3">
                    <label for="carga_horaria" class="form-label">Carga Horária</label>
                    <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" required>
                </div>
                <div class="mb-3">
                    <label for="data_inicio" class="form-label">Data de Início</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                        value="{{ old('data_inicio') }}" required>
                </div>

                <div class="mb-3">
                    <label for="data_fim" class="form-label">Data de Fim</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar Curso</button>
            </form>
        </div>
    </div>
@endsection
