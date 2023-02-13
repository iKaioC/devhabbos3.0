<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class VpsController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        return view('web.servers', compact('servers'));
    }

    public function brasil()
    {
        $servers = Server::all();
        return view('web.servers_brasil', compact('servers'));
    }
}
