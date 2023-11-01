<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /* Verificar se o usuário está logado no sistema */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(Gate::allows('type-user')){
            $user = User::all()->sortBy('name');
            return view('users.index', compact('user'));
        }else{
            return back();
        }
    }

    public function create()
    {
        if(Gate::allows('type-user')){
        $user = new User();
        return view('users.create', compact('user'));
        }else{
            return back();
        }
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        //dd($input);

        $input['user_id'] = 1;

        User::create($input);
        $input['password'] = bcrypt($input['password']);
        return redirect()->route('users.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        if(!$user){
            return back();
        }

        if(auth()->user()->id == $user['id'] || auth()->user()->tipo == 'admin'){
           return view('users.edit', compact('user'));
        }else {
            return back();
        }


    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');

        if ($request->password != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->tipo = $request->input('tipo');

        $user->save();

        return redirect()->route('users.index')->with('sucesso', 'Usuário alterado com sucesso!');
    }

    public function destroy(User $user)
    {

    }
}
