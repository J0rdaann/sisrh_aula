<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nasc', 'sexo', 'email', 'telefone', 'cpf', 'foto', 'salario', 'departamento_id', 'cargo_id', 'user_id', 'data_contratacao', 'data_desligamento', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }


}
