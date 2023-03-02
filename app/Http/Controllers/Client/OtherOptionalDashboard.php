<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtherOptionalDashboard extends Controller
{
    public function listOtherOptionals()
    {
        $user = Auth::user();
        $otheroptionals = DB::table('user_other_optional')
            ->where('user_other_optional.user_id', $user->id)
            ->get();

        return view('client.optional.others', compact('otheroptionals'));
    }
}
