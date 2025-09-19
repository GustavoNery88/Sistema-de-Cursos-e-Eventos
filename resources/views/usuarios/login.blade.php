@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Entrar</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('usuarios.autenticar')}} " method="POST">
            @csrf    
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Entrar</button>
           
                <p class="mt-5">Email: teste@gmail.com</p>
                <p>Senha: teste123</p>
        </form>
    </div>
</div>
@endsection
