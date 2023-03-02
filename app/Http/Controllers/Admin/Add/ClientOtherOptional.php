<?php

namespace App\Http\Controllers\Admin\Add;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserOtherOptional;
use App\Http\Controllers\Controller;

class ClientOtherOptional extends Controller
{
    public function index()
    {
        $optionals = UserOtherOptional::all();
        $users = User::all();
        return view('admin.add.addotheroptional', compact('optionals', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'pay' => 'required',
            'status' => 'required',
            'supportdate' => 'nullable'
        ]);
    
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return back()->with('error', 'O email do cliente não existe.');
        }
    
        $userOptional = new UserOtherOptional();
        $userOptional->user_id = $user->id;
        $userOptional->name = $request->input('name');
        $userOptional->category = $request->input('category');
        $userOptional->description = $request->input('description');
        $userOptional->pay = $request->input('pay');
        $userOptional->status = $request->input('status');
        $userOptional->supportdate = $request->input('supportdate');
        $userOptional->save();
    
        return redirect()->route('admin-clients')->with('message', 'Outro Opcional adicionado com sucesso!');
    }

    public function edit($id)
    {
        // Recuperar o serviço a partir do ID
        $userOptional = UserOtherOptional::findOrFail($id);
        $optional = $userOptional->optional;
    
        // Carregar o usuário proprietário do servidor VPS
        $user = $userOptional->user;
    
        // Carregar os servidores disponíveis para exibição no formulário
        $optionals = UserOtherOptional::all();
    
        return view('admin.add.editotheroptional', compact('optional', 'optionals', 'userOptional', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'pay' => 'required',
            'status' => 'required',
            'supportdate' => 'required'
        ]);
    
        $userOptional = UserOtherOptional::findOrFail($id);
        $userOptional->name = $request->input('name');
        $userOptional->category = $request->input('category');
        $userOptional->description = $request->input('description');
        $userOptional->pay = $request->input('pay');
        $userOptional->status = $request->input('status');
        $userOptional->supportdate = $request->input('supportdate');
        $userOptional->save();
    
        return redirect()->back()->with('message', 'Outro Opcional atualizado com sucesso!');
    }
}
