<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Optional;
use Illuminate\Http\Request;

class OptionalWebController extends Controller
{
    public function index()
    {
        $optionals = Optional::all();
        return view('web.optionals', compact('optionals'));
    }
}
