<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiodController extends Controller
{
    /* Verificar se o usuário está logado no sistema */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
