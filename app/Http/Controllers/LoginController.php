<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function auth(Request $request)
    {
        $crendencias = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
            ],
            [
                'email.required' => 'O campo e-mail é obrigatório',
                'email.email' => 'o e-mail informado não é válido',
                'password.required' => 'O campo senha é obrigatório'
            ]);

            if(Auth::attempt($crendencias)){
                $request->session()->regenerate();
                return redirect()->route('funcionarios.index');
            } else{
                return redirect()->back()->with('erro', 'E-mail ou senha inválida');
            }
    }
}
