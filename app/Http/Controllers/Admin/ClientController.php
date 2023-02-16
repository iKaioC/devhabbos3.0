<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientFormRequest;

class ClientController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $users = User::all();

        return view('admin.client.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(ClientFormRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rank' => $request->input('rank'),
            'cell' => $request->input('cell'),
            'link' => $request->input('link'),
        ]);

        return redirect()->route('admin-clients')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('admin.client.edit', compact('user'));
    }

    public function update(ClientFormRequest $request, User $user)
    {
        $validatedData = $request->validated();
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->rank = $validatedData['rank'];
        $user->cell = $validatedData['cell'];
        $user->link = $validatedData['link'];
    
        $user->save();
    
        return redirect()->route('admin-clients')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function showVps($id)
    {
        $user = User::findOrFail($id);
        $servers = $user->servers()->select('servers.*', 'user_server.status', 'user_server.pay')->get();
        return view('admin.client.servers', compact('servers', 'user'));
    }  
    
}
