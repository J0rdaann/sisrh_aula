@extends('layouts.default')
@section('title', 'Benefícios')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ @route('beneficios.create') }}</x-slot>
        <x-slot name="title">Cadastrar Benefícios</x-slot>
    </x-btn-create>
    <h1 class="fs-2 mb-3">Lista de Benefícios</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>

    @endif

    <x-busca>
        <x-slot name="rota">{{ route('beneficios.index') }}</x-slot>
        <x-slot name="tipo">Benefício</x-slot>
    </x-busca>

    <table class="table table-striped">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Descrição</th>
            <th scope="col" width="100">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($beneficios as $beneficio)
          <tr>
            <th class="text-center" scope="row">{{ $beneficio->id }}</th>
            <td class="text-center">{{ $beneficio->descricao}}</td>
            <td class="text-center">
                <a href="{{ route('beneficios.edit', $beneficio->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $beneficio->id }}"><i class="bi bi-trash"></i></a>
                <x-modal-delete>
                    <x-slot name="id">{{$beneficio->id }}</x-slot>
                    <x-slot name="tipo">beneficio</x-slot>
                    <x-slot name="nome">{{ $beneficio->descricao }}</x-slot>
                    <x-slot name="rota">beneficios.destroy</x-slot>
                </x-modal-delete>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
