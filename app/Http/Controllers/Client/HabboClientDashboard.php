<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HabboClientDashboard extends Controller
{
    public function listHabbos()
    {
        $user = Auth::user();
        $habbos = DB::table('user_habbo')
            ->join('habbos', 'user_habbo.habbo_id', '=', 'habbos.id')
            ->select('user_habbo.*', 'habbos.name', 'habbos.emulator', 'habbos.cms', 'habbos.language', 'habbos.price')
            ->where('user_habbo.user_id', $user->id)
            ->get();

        return view('client.habbo.index', compact('habbos'));
    }
}
