@extends('layouts.default')
@section('title', 'Departamento')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ @route('departamentos.create') }}</x-slot>
        <x-slot name="title">Cadastrar Departamento</x-slot>
    </x-btn-create>
    <h1 class="fs-2 mb-3">Lista de Departamentos</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>

    @endif

    <x-busca>
        <x-slot name="rota">{{ route('departamentos.index') }}</x-slot>
        <x-slot name="tipo">Departamento</x-slot>
    </x-busca>

    <table class="table table-striped">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col" width="100">Funcionários</th>
            <th scope="col" width="110px">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($departamentos as $departamento)
          <tr>
            <th class="text-center" scope="row">{{ $departamento->id }}</th>
            <td class="text-center">{{ $departamento->nome}}</td>
            <td class="text-center">{{ $departamento->funcionariosAtivos->count();}}</td>
            <td class="text-center">
                <a href="{{ route('departamentos.edit', $departamento->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="" title="Deletar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
