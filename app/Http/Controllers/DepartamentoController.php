<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /* Verificar se o usuário está logado no sistema */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$departamentos = Departamento::all()->sortBy('nome');
        return view('departamentos.index', compact('departamentos'));*/

        $departamentos = Departamento::where('nome', 'like','%'.$request->busca.'%')
        ->orderBy('nome', 'asc')->paginate(3);

        $totalDepartamentos = Departamento::all()->count();
        // Receber os dados do banco
        return view('departamentos.index', compact('departamentos', 'totalDepartamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all()->sortBy('nome');
        return view('departamentos.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->toArray();
        //dd($input);

        $input['user_id'] = 1;
        Departamento::create($input);

        return redirect()->route('departamentos.index')->with('sucesso', 'Departamento cadastrado com sucesso!');
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
        $departamento = Departamento::find($id);

        if(!$departamento){
            return back();
        }

        return view('departamentos.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departamento = Departamento::find($id);

        $departamento->nome = $request->input('nome');
        $departamento->save();

        return redirect()->route('departamentos.index')->with('sucesso', 'Funcionario alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamento::find($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('sucesso', 'Departamento deletado com sucesso!');
    }
}
