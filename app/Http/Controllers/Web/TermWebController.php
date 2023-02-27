<?php

namespace App\Http\Controllers\Web;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermWebController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('web.terms', compact('terms'));
    }
}
