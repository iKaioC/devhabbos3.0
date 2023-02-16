<?php

namespace App\Http\Controllers\Client;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;

class TicketClientController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tickets = $user->tickets()->with('user')->get();
        return view('client.ticket.index', compact('tickets'));
    }

    public function create()
    {
        return view('client.ticket.create');
    }

    public function edit(Ticket $ticket)
    {
        $user = auth()->user();
        if ($ticket->user_id !== $user->id) {
            return redirect()->route('tickets-index')->with('error', 'Você não tem permissão para acessar este ticket!');
        }
    
        $ticket->load('user', 'comments.user');
        return view('client.ticket.edit', compact('ticket'));
    }

    public function store(TicketFormRequest $request)
    {
        $ticket = new Ticket([
            'title' => $request->title,
            'category' => $request->category,
            'status' => 'Aberto',
            'priority' => $request->priority,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);
    
        $ticket->save();
    
        return redirect()->route('tickets-index')->with('success', 'Ticket criado com sucesso!');
    }
}
