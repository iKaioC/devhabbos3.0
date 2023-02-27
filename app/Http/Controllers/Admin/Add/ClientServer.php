<?php

namespace App\Http\Controllers\Admin\Add;

use App\Models\User;
use App\Models\Server;
use App\Models\UserServer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ClientServer extends Controller
{
    public function index()
    {
        $servers = Server::all();
        $users = User::all();
        return view('admin.add.addserver', compact('servers', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'server_id' => 'required|exists:servers,id',
            'product_type' => 'required',
            'status' => 'required',
            'pay' => 'nullable|numeric',
            'ipserver' => 'required',
            'duedate' => 'required|date_format:d/m/Y'
        ]);
    
        // Converte a data para o formato Y-m-d
        $duedate = Carbon::createFromFormat('d/m/Y', $request->input('duedate'))->format('Y-m-d');
    
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return back()->with('error', 'O email do cliente não existe.');
        }
    
        $userServer = new UserServer();
        $userServer->user_id = $user->id;
        $userServer->server_id = $request->input('server_id');
        $userServer->product_type = $request->input('product_type');
        $userServer->status = $request->input('status');
        $userServer->pay = $request->input('pay');
        $userServer->ipserver = $request->input('ipserver');
        $userServer->duedate = $duedate;
        $userServer->save();
    
        return redirect()->route('admin-servers')->with('message', 'Servidor adicionado ao cliente!');
    }

    public function edit($id)
    {
        // Recuperar o serviço a partir do ID
        $userServer = UserServer::findOrFail($id);
        $server = $userServer->server;
    
        // Carregar o usuário proprietário do servidor VPS
        $user = $userServer->user;
    
        // Carregar os servidores disponíveis para exibição no formulário
        $servers = Server::all();
    
        return view('admin.add.editserver', compact('server', 'servers', 'userServer', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'server_id' => 'required|exists:servers,id',
            'product_type' => 'required|string',
            'status' => 'required',
            'pay' => 'nullable|numeric',
            'ipserver' => 'required',
            'duedate' => 'required|date_format:d/m/Y'
        ]);
    
        $userServer = UserServer::findOrFail($id);
        $userServer->server_id = $request->input('server_id');
        $userServer->product_type = $request->input('product_type');
        $userServer->status = $request->input('status');
        $userServer->pay = $request->input('pay');
        $userServer->ipserver = $request->input('ipserver');
        $userServer->duedate = Carbon::createFromFormat('d/m/Y', $request->input('duedate'))->toDateString();
        $userServer->save();
    
        return redirect()->back()->with('message', 'VPS atualizado com sucesso!');
    }
}
