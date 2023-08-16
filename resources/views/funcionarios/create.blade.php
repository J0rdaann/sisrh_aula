@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Funcionário')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro do Funcionário</h1>

    <form class="row g-3">
        <div class="col-md-6">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control form-control-lg" id="nome" name="nome">
        </div>
        <div class="col-md-6">
          <label for="data_nasc" class="form-label">Dada de Nascimento</label>
          <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
        </div>
        <div class="col-md-4">
          <label for="sexo" class="form-label">Sexo</label>
          <select id="sexo" name="sexo" class="form-select" required>
                <option value=""></option>
                <option value="m">Masculino</option>
                <option value="f">Feminino</option>
                <option value="o">Outros</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" minlength="11" required>
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label">E-mail</label>
          <input type="emaiç" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="col-md-4">
          <label for="departamento_id" class="form-label">Departamento</label>
          <select id="departamento_id" name="departamento_id" class="form-select" required>
            <option value="">Marketing</option>
            <option value="">Tecnologia</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="cargo_id" class="form-label">Cargos</label>
          <select id="cargo_id" name="cargo_id" class="form-select" required>
            <option value="">Gerente</option>
            <option value="">Superfisor</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="salario" class="form-label">Salário</label>
          <input type="text" class="form-control" id="salario" name="salario" required>
        </div>
        <div class="col-md-4">
          <label for="data_contratacao" class="form-label">Data de Contratação</label>
          <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" required>
        </div>
        <div class="col-md-4">
          <label for="data_desligamento" class="form-label">Data de Desligamento</label>
          <input type="date" class="form-control" id="data_desligamento" name="data_desligamento" >
        </div>
        <div class="col-12">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
          <a href="{{ route('funcionarios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>

@endsection
