<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function funcionariosAtivos()
    {
        return $this->hasMany(Funcionario::class)->where('status','=', 'on');
    }
}
