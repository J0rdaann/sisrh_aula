<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
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
        /*$cargos = Cargo::all()->sortBy('descricao');
        return view('cargos.index', compact('cargos'));*/

        $cargos = Cargo::where('descricao', 'like','%'.$request->busca.'%')
        ->orderBy('descricao', 'asc')->paginate(3);

        $totalCargos = Cargo::all()->count();

        // Receber os dados do banco
        return view('cargos.index', compact('cargos', 'totalCargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::all()->sortBy('descricao');
        return view('cargos.create', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        //dd($input);

        $input['user_id'] = 1;
        Cargo::create($input);

        return redirect()->route('cargos.index')->with('sucesso', 'Cargo cadastrado com sucesso!');
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
        $cargo = Cargo::find($id);
        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cargos = Cargo::find($id);

        $cargos->descricao = $request->input('descricao');
        $cargos->save();

        return redirect()->route('cargos.index')->with('sucesso', 'Funcionario alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargo = Cargo::find($id);
        $cargo->delete();
        return redirect()->route('cargos.index')->with('sucesso', 'Cargo deletado com sucesso!');
    }
}
