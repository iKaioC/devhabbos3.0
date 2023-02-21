<?php

namespace App\Http\Controllers\Client;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketComment;
use App\Http\Controllers\Controller;

class TicketCommentClientController extends Controller
{
    public function store(Ticket $ticket, Request $request)
    {
        $comment = new TicketComment();
        $comment->comment = $request->comment;
        $comment->ticket_id = $ticket->id;
        $comment->user_id = auth()->id();
        $comment->save();

        return back()->with('success', 'Comentário adicionado com sucesso!');
    }
}
