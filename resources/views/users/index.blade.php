@extends('layouts.default')
@section('title', 'User')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ route('users.create') }}</x-slot>
        <x-slot name="title">Cadastrar Usuário</x-slot>
    </x-btn-create>
    <h1 class="fs-2 mb-3">Lista Usuários</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $usuario)
            <tr>
                <th class="text-center" scope="row">{{ $usuario->id }}</th>
                <td class="text-center">{{ $usuario->name}}</td>
                <td class="text-center">{{ $usuario->email}}</td>
                <td class="text-center">{{ $usuario->tipo}}</td>
                <td class="text-center">
                    <a href="{{ route('users.edit', $usuario->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                    <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $usuario->id }}"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
