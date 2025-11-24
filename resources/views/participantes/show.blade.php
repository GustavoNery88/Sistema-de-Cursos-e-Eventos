@extends('layouts.app')

@section('title', 'Lista de participantes')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($curso->participantes as $participante)
                <tr>
                    <td scope="row">{{$participante->nome}}</td>
                    <td>{{$participante->cpf}}</td>
                    <td>{{$participante->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
