<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.main');
    }

    public function store(Request $request)
    {
        Users::create([
            'nome' => $request->nome,
            'nascimento' => $request->nascimento,
            'sexo' => $request->sexo,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'estado' => $request->estado,
            'cidade' => $request->cidade
        ]);

        return redirect()->route('listar_usuario', ['success' => "1"]);
    }

    public function list() {
        $users = Users::all();
        
        return view('users.main', ['users' => $users]);
    }

    public function edit($id) {
        $user = Users::findOrFail($id);
        
        return view('users.main', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = Users::findOrFail($id);
        
        $user->update([
            'nome' => $request->nome,
            'nascimento' => $request->nascimento,
            'sexo' => $request->sexo,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'estado' => $request->estado,
            'cidade' => $request->cidade
        ]);

        return redirect()->route('listar_usuario', ['success' => "1"]);
    }

    public function remove($id) {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('listar_usuario', ['success' => "1"]);
    }
}
