@extends('layouts.default')

@section('title', 'SisRH - Funcionários')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{  route('funcionarios.create')  }}</x-slot>
        <x-slot name="title">Cadastrar Funcionário</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Funcionários</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>

    @endif

    <table class="table table-striped">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Departamento</th>
            <th scope="col" width="110px">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr class="align-middle">
                    <th class="text-center" scope="row">{{ $funcionario->id }}</th>
                    <td class="text-center">
                        @if (empty($funcionario->foto))
                            <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70">
                        @else
                            <img src="{{ url("storage/funcionarios/$funcionario->foto") }}" alt="Fotos" class="img-thumbnail" width="70" >
                        @endif
                    </td>
                    <td class="text-center">{{ $funcionario->nome }}</td>
                    <td class="text-center">{{ $funcionario->cargo->descricao }}</td>
                    <td class="text-center">{{ $funcionario->departamento->nome }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $funcionario->id }}"><i class="bi bi-trash"></i></a>
                        <x-modal-delete>
                            <x-slot name="id">{{ $funcionario->id }}</x-slot>
                            <x-slot name="tipo">funcionário</x-slot>
                            <x-slot name="nome">{{ $funcionario->nome }}</x-slot>
                            <x-slot name="rota">funcionarios.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
          @endforeach

        </tbody>
      </table>

@endsection
