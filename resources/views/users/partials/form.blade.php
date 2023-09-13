<div class="col-md-6">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? "" }}" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? "" }}" required>
  </div>
  <div class="col-md-4">
    <label for="email" class="form-label">Senha</label>
    <input type="password" class="form-control" id="password" name="password" value="" @required(!isset($user->password))>
    </div>
    <div class="col-md-4">
        <label for="tipo" class="form-label">Tipo</label>
        <select id="tipo" name="tipo" class="form-select">
            <option value="usuario" {{ old('tipo', isset($user) ? $user->tipo : '') == 'usuario' ? 'selected' : '' }}>usuario</option>
            <option value="admin" {{ old('tipo', isset($user) ? $user->tipo : '') == 'admin' ? 'selected' : '' }}>admin</option>
        </select>


    </div>

