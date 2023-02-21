<?php

namespace App\Http\Controllers\Web;

use App\Models\Habbo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HabboWebController extends Controller
{
    public function index()
    {
        $habbos = Habbo::with('images')->get();
        return view('web.habbos', compact('habbos'));
    }

    public function show($slug)
    {
        $habbo = Habbo::with('images')->where('slug', $slug)->firstOrFail();
        return view('web.habbo.index', compact('habbo'));
    }
}
