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

    <table class="table table-striped">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($departamentos as $departamentos)
          <tr>
            <th class="text-center" scope="row">{{ $departamentos->id }}</th>
            <td class="text-center">{{ $departamentos->nome}}</td>
            <td class="text-center">
                <a href="{{ route('departamentos.edit', $departamentos->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="" title="Deletar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
