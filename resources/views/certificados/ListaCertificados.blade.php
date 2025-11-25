@extends('layouts.app')

@section('title', 'Certificados')

@section('content')
    @foreach ($certificados as $certificado)
        <div class="border border-black d-flex justify-content-between align-items-center p-3 mb-3">

            <p class="mb-0 bold"><b>{{ $certificado->nome }}</b></p>

            <form action="{{ route('certificados.download', ['curso' => $certificado->id, 'participante' => $participante->id,]) }}"
                method="GET">
                <button type="submit">
                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                </button>
            </form>

        </div>
    @endforeach
@endsection
