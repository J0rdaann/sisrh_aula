@extends('layouts.default')
@section('title', 'SisRH - Cadastro de Departamento')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro de Departamento</h1>

    <form class="row g-3" method="POST" action="{{ route('departamentos.store') }}" enctype="multipart/form-data">
        @csrf <!--token for security-->
        @include('departamentos.partials.form')
        <div class="col-12">
          <button type="submit" class="btn btn-success">Cadastrar</button>
          <a href="{{ route('departamentos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
@endsection
