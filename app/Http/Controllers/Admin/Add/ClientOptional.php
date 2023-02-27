<?php

namespace App\Http\Controllers\Admin\Add;

use App\Models\User;
use App\Models\Optional;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\UserOptional;

class ClientOptional extends Controller
{
    public function index()
    {
        $optionals = Optional::all();
        $users = User::all();
        return view('admin.add.addoptional', compact('optionals', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'optional_id' => 'required|exists:optionals,id',
            'product_type' => 'required',
            'status' => 'required',
            'pay' => 'required|numeric',
            'supportdate' => 'nullable|date_format:d/m/Y'
        ]);
    
        // Converte a data para o formato Y-m-d
        $supportdate = Carbon::createFromFormat('d/m/Y', $request->input('supportdate'))->format('Y-m-d');
    
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return back()->with('error', 'O email do cliente não existe.');
        }
    
        $userOptional = new UserOptional();
        $userOptional->user_id = $user->id;
        $userOptional->optional_id = $request->input('optional_id');
        $userOptional->product_type = $request->input('product_type');
        $userOptional->status = $request->input('status');
        $userOptional->pay = $request->input('pay');
        $userOptional->supportdate = $supportdate;
        $userOptional->save();
    
        return redirect()->route('admin-clients')->with('message', 'Opcional adicionado com sucesso!');
    }

    public function edit($id)
    {
        // Recuperar o serviço a partir do ID
        $userOptional = UserOptional::findOrFail($id);
        $optional = $userOptional->optional;
    
        // Carregar o usuário proprietário do servidor VPS
        $user = $userOptional->user;
    
        // Carregar os servidores disponíveis para exibição no formulário
        $optionals = Optional::all();
    
        return view('admin.add.editoptional', compact('optional', 'optionals', 'userOptional', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'optional_id' => 'required|exists:optionals,id',
            'product_type' => 'required|string',
            'status' => 'required',
            'pay' => 'required|numeric',
            'supportdate' => 'required|date_format:d/m/Y'
        ]);
    
        $userOptional = UserOptional::findOrFail($id);
        $userOptional->optional_id = $request->input('optional_id');
        $userOptional->product_type = $request->input('product_type');
        $userOptional->status = $request->input('status');
        $userOptional->pay = $request->input('pay');
        $userOptional->supportdate = Carbon::createFromFormat('d/m/Y', $request->input('supportdate'))->toDateString();
        $userOptional->save();
    
        return redirect()->back()->with('message', 'Opcional atualizado com sucesso!');
    }
}
