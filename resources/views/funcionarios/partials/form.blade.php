<div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $funcionario->nome ?? "" }}" required>
  </div>
  <div class="col-md-6">
    <label for="data_nasc" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="{{ $funcionario->data_nasc ?? "" }}" required>
  </div>
  <div class="col-md-4">
      <label for="sexo" class="form-label">Sexo</label>
      <select id="sexo" name="sexo" class="form-select" required>
          <option value=""></option>
          <option value="m" @if(@isset($funcionario->sexo)) @selected($funcionario->sexo == 'm')@endif>Masculino</option>
          <option value="f" @if(@isset($funcionario->sexo)) @selected($funcionario->sexo == 'f')@endif >Feminino</option>
          <option value="o" @if(@isset($funcionario->sexo)) @selected($funcionario->sexo == 'o')@endif >Outros</option>
      </select>
    </div>
  <div class="col-md-4">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" minlength="11" maxlength="11" value="{{ $funcionario->cpf ?? "" }}" required>
  </div>
  <div class="col-md-4">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $funcionario->email ?? "" }}" required>
  </div>
  <div class="col-md-4">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $funcionario->telefone ?? "" }}" required>
  </div>
  <div class="col-md-4">
    <label for="departamento_id" class="form-label">Departamentos</label>
    <select id="departamento_id" name="departamento_id" class="form-select"  required>
        <option value="">--</option>
        @foreach ($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-md-4">
      <label for="cargo_id" class="form-label">Cargos</label>
      <select id="cargo_id" name="cargo_id" class="form-select"  required>
        <option value="">--</option>
        @foreach ($cargos as $cargo)
            <option value="{{ $cargo->id }}">{{ $cargo->descricao }}</option>
        @endforeach
      </select>
    </div>
  <div class="col-md-4">
    <label for="salario" class="form-label">Salário</label>
    <input type="text" class="form-control" id="salario" name="salario" value="{{ $funcionario->salario ?? "" }}" required>
  </div>
  <div class="col-md-4">
    <label for="data_contratacao" class="form-label">Data de Contratação</label>
    <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" required>
  </div>
  <div class="col-md-4">
    <label for="data_desligamento" class="form-label">Data de Desligamento</label>
    <input type="date" class="form-control" id="data_desligamento" name="data_desligamento" >
  </div>
  <div class="col-md-2">
        <img src="{{ asset('images/sombra_funcionario.jpg') }}" alt="" class="img-thumbnail">
  </div>
  <div class="col-md-10">
      <label for="foto" class="form-label">Foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
  </div>
