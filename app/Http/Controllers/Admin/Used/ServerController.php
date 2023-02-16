<?php

namespace App\Http\Controllers\Admin\Used;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerController extends Controller
{
    public function index()
    {
        $usersWithServers = User::with('servers')->get();

        return view('admin.used.servers', compact('usersWithServers'));
    }
}
