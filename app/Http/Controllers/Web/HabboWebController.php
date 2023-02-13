<?php

namespace App\Http\Controllers\Web;

use App\Models\Habbo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HabboWebController extends Controller
{
    public function index()
    {
        $habbos = Habbo::all();
        return view('web.habbos', compact('habbos'));
    }
}
