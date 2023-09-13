
@extends('layouts.default')
@section('title', 'SisRH - Alteração de Departamento')

@section('content')
    <h1 class="fs-2 mb-3">Alterar Departamento</h1>

    <form class="row g-3" method="POST" action="{{ route('departamentos.update', $departamento->id) }}" enctype="multipart/form-data">
        @csrf <!--token for security-->
        @method('PUT')
        @include('departamentos.partials.form')
        <div class="col-12">
          <button type="submit" class="btn btn-success">Editar</button>
          <a href="{{ route('departamentos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
@endsection
