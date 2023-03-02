<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\UserOtherOptional;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientFormRequest;

class ClientController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $users = User::all();
        $otheroptionals = DB::table('users')
            ->leftJoin('user_other_optional', 'users.id', '=', 'user_other_optional.user_id')
            ->select(DB::raw('count(user_other_optional.id) as count, users.id'))
            ->groupBy('users.id')
            ->pluck('count', 'id');
        
        return view('admin.client.index', compact('users', 'otheroptionals'));
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
        $servers = $user->servers()
                        ->selectRaw('servers.*, user_server.status, user_server.pay, user_server.ipserver, user_server.duedate, user_server.id as user_server_id')
                    ->get();
        return view('admin.client.servers', compact('servers', 'user'));
    }

    public function showHabbos($id)
    {
        $user = User::findOrFail($id);
        $habbos = $user->habbos()
                        ->selectRaw('habbos.*, user_habbo.status, user_habbo.pay, user_habbo.supportdate, user_habbo.id as user_habbo_id')
                    ->get();
        return view('admin.client.habbos', compact('habbos', 'user'));
    }

    public function showOptionals($id)
    {
        $user = User::findOrFail($id);
        $optionals = $user->optionals()
                        ->selectRaw('optionals.*, user_optional.status, user_optional.pay, user_optional.supportdate, user_optional.id as user_optional_id')
                    ->get();
        return view('admin.client.optionals', compact('optionals', 'user'));
    }

    public function showOtherOptionals($id)
    {
        $user = User::findOrFail($id);
        $otheroptionals = UserOtherOptional::where('user_id', $id)->get();
        return view('admin.client.otheroptionals', compact('otheroptionals', 'user'));
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
