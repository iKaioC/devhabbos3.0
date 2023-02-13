<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServerClientController extends Controller
{
    public function listServers()
    {
        $user = Auth::user();
        $servers = DB::table('user_server')
            ->join('servers', 'user_server.server_id', '=', 'servers.id')
            ->select('user_server.*', 'servers.name', 'servers.memory', 'servers.vcpu', 'servers.type_storage', 'servers.amount_storage', 'servers.system', 'servers.locale', 'servers.price')
            ->where('user_server.user_id', $user->id)
            ->get();

        return view('client.server.index', compact('servers'));
    }
}
