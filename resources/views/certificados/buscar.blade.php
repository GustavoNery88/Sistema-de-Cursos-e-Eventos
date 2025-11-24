@extends('layouts.app')

@section('title', 'Buscar Certificados')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Buscar Certificados</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('certificados.buscar') }}" method="GET" class="d-flex" role="search">
                <input name="cpf" class="form-control me-2" type="search" placeholder="CPF" value="{{ request('cpf') }}" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Buscar Certificados</button>
            </form>
        </div>
    </div>
@endsection
