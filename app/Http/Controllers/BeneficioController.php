<?php

namespace App\Http\Controllers;

use App\Models\Beneficio;
use Illuminate\Http\Request;

class BeneficioController extends Controller
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
        $beneficios = Beneficio::where('descricao', 'like','%'.$request->busca.'%')
        ->orderBy('descricao', 'asc')->paginate(3);

        $totalBeneficios = Beneficio::all()->count();

        // Receber os dados do banco
        return view('beneficios.index', compact('beneficios', 'totalBeneficios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();

        Beneficio::create($input);

        return redirect()->route('beneficios.index')->with('sucesso', 'Benefício cadastrado com sucesso!');
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
        $beneficio = Beneficio::find($id);
        return view('beneficios.edit', compact('beneficio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beneficios = Beneficio::find($id);

        $beneficios->descricao = $request->input('descricao');
        $beneficios->save();

        return redirect()->route('beneficios.index')->with('sucesso', 'Benefício alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beneficios = Beneficio::find($id);
        $beneficios->delete();
        return redirect()->route('beneficios.index')->with('sucesso', 'Benefício deletado com sucesso!');
    }
}
