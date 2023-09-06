<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all()->sortBy('nome');

        // Receber os dados do banco através
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna o formulário de cadastro do funcionário
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        return view('funcionarios.create', compact('departamentos', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        // dd($input);

        $input['user_id'] = 1;

        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        Funcionario::create($input);

        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario Cadastrado com sucesso');
    }

    //Função para redimensionar e realizar o upload da foto
    private function uploadFoto($foto){
        $nomeArquivo = $foto->hashName();

        //Redimencionar foto
        $imagem = Image::make($foto)->fit(200,200);

        //Salvar arquivo da foto
        Storage::put('public/funcionarios/'.$nomeArquivo, $imagem->encode());

        //Upload sem redimensionar
        //$foto->store('public/funcionarios/');

        return $nomeArquivo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcionario  = Funcionario::find($id);

        if(!$funcionario){
            return back();
        }

        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');

        return view('funcionarios.edit', compact('funcionario', 'departamentos', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $funcionario = Funcionario::find($id);

        if($request->hasFile('foto')){
            Storage::delete('public/funcionario/' .$funcionario['foto']);
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        $funcionario->fill($input);
        $funcionario->save();
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
