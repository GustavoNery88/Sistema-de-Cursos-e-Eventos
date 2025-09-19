@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Cadastrar Usuário</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
