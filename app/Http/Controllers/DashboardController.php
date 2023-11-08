<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /* Verificar se o usuário está logado no sistema */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalFuncionarios = Funcionario::where('status', 'on')->count();
        $totalCargos = Cargo::all()->count();
        $totalDepartamentos = Departamento::all()->count();
        $somaSalarios = Funcionario::where('status', 'on')->sum('salario');

        //Dados dos departamentos
        $departamentos = Departamento::all()->sortBy('nome');
        // Dados de cargos
        $cargos = Cargo::all()->sortBy('descricao');

        return view('dashboard.index', compact('totalFuncionarios', 'totalCargos', 'totalDepartamentos', 'somaSalarios', 'departamentos', 'cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
