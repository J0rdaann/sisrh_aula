
@extends('layouts.default')
@section('title', 'SisRH - Alteração de Cargos')

@section('content')
    <h1 class="fs-2 mb-3">Alterar Cargo</h1>

    <form class="row g-3" method="POST" action="{{ route('cargos.update', $cargo->id) }}" enctype="multipart/form-data">
        @csrf <!--token for security-->
        @method('PUT')
        @include('cargos.partials.form')
        <div class="col-12">
          <button type="submit" class="btn btn-success">Editar</button>
          <a href="{{ route('cargos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
@endsection
