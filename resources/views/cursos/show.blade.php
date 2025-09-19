@extends('layouts.app')

@section('title', 'Visualizar Curso')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $curso->nome }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Descrição:</strong> {{ $curso->descricao ?? 'Não informada' }}</p>
        <p><strong>Local:</strong> {{ $curso->local ?? 'Não informado' }}</p>
        <p><strong>Carga Horária:</strong> {{ $curso->carga_horaria ?? 'Não definida' }} horas</p>
        <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
        <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>
        </div>
    </div>
</div>
@endsection
