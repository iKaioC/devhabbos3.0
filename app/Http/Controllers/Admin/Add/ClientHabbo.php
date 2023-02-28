<?php

namespace App\Http\Controllers\Admin\Add;

use App\Models\User;
use App\Models\Habbo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\UserHabbo;

class ClientHabbo extends Controller
{
    public function index()
    {
        $habbos = Habbo::all();
        $users = User::all();
        return view('admin.add.addhabbo', compact('habbos', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'habbo_id' => 'required|exists:habbos,id',
            'product_type' => 'required',
            'status' => 'required',
            'pay' => 'required|numeric',
            'supportdate' => 'required'
        ]);
    
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return back()->with('error', 'O email do cliente não existe.');
        }
    
        $userHabbo = new UserHabbo();
        $userHabbo->user_id = $user->id;
        $userHabbo->habbo_id = $request->input('habbo_id');
        $userHabbo->product_type = $request->input('product_type');
        $userHabbo->status = $request->input('status');
        $userHabbo->pay = $request->input('pay');
        $userHabbo->supportdate = $request->input('supportdate');
        $userHabbo->save();
    
        return redirect()->route('admin-clients')->with('message', 'Habbo adicionado com sucesso!');
    }

    public function edit($id)
    {
        // Recuperar o serviço a partir do ID
        $userHabbo = UserHabbo::findOrFail($id);
        $habbo = $userHabbo->habbo;
    
        // Carregar o usuário proprietário do servidor VPS
        $user = $userHabbo->user;
    
        // Carregar os servidores disponíveis para exibição no formulário
        $habbos = Habbo::all();
    
        return view('admin.add.edithabbo', compact('habbo', 'habbos', 'userHabbo', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'habbo_id' => 'required|exists:habbos,id',
            'product_type' => 'required|string',
            'status' => 'required',
            'pay' => 'required|numeric',
            'supportdate' => 'required'
        ]);
    
        $userHabbo = UserHabbo::findOrFail($id);
        $userHabbo->habbo_id = $request->input('habbo_id');
        $userHabbo->product_type = $request->input('product_type');
        $userHabbo->status = $request->input('status');
        $userHabbo->pay = $request->input('pay');
        $userHabbo->supportdate = $request->input('supportdate');
        $userHabbo->save();
    
        return redirect()->back()->with('message', 'Habbo atualizado com sucesso!');
    }
}
