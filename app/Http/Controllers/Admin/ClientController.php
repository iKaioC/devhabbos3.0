<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientFormRequest;
use App\Models\Ticket;

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

    public function update(ClientFormRequest $request, $id)
    {
        $validatedData = $request->validated();
    
        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
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

    public function showHabbos($id)
    {
        $user = User::findOrFail($id);
        $habbos = $user->habbos()->select('habbos.*', 'user_habbo.status')->get();
        return view('admin.client.habbos', compact('habbos', 'user'));
    }

    public function showOptionals($id)
    {
        $user = User::findOrFail($id);
        $optionals = $user->optionals()->select('optionals.*', 'user_optional.status')->get();
        return view('admin.client.optionals', compact('optionals', 'user'));
    }

    public function showTestimonials()
    {
        $testimonials = Testimonial::with('user')->get();

        return view('admin.client.testimonials', compact('testimonials'));
    }

    public function showTickets()
    {
        $tickets = Ticket::with('user')->get();

        return view('admin.client.tickets.index', compact('tickets'));
    }
    
}
