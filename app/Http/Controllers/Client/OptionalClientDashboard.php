<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OptionalClientDashboard extends Controller
{
    public function listOptionals()
    {
        $user = Auth::user();
        $optionals = DB::table('user_optional')
            ->join('optionals', 'user_optional.optional_id', '=', 'optionals.id')
            ->select('user_optional.*', 'optionals.name', 'optionals.description', 'optionals.price')
            ->where('user_optional.user_id', $user->id)
            ->get();

        return view('client.optional.index', compact('optionals'));
    }
}
