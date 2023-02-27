<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketResponse extends Controller
{
    public function edit(Ticket $ticket)
    {
        $ticket->load('user', 'comments.user');
    
        return view('admin.client.tickets.edit', compact('ticket'));
    }

    public function update(Ticket $ticket, Request $request)
    {
        $ticket->status = $request->status;
        $ticket->save();
    
        return view('admin.client.tickets.edit', compact('ticket'))->with('success', 'Status do ticket atualizado com sucesso!');
    }
}
