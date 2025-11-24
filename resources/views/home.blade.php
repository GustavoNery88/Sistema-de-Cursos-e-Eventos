@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($cursos as $curso)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $curso->nome }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><strong>Local:</strong>
                                {{ $curso->local ?? 'Não informado' }}</h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <strong>Data:</strong>
                                {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') ?? '-' }} -
                                {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') ?? '-' }}
                            </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><strong>Carga Horaria:</strong>
                                {{ $curso->carga_horaria}}</h6>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-secondary">Visualizar</a>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('participantes.show', $curso->id) }}" class="btn btn-success ">Participantes</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Nenhum curso cadastrado.</p>
            @endforelse
        </div>

        <div class="paginacao">
            {{ $cursos->links() }}
        </div>
    </div>

@endsection
