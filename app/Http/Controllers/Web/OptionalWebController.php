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
        return view('web.optional.optionals', compact('optionals'));
    }

    public function habbo()
    {
        $optionals = Optional::all();
        return view('web.optional.opthabbo', compact('optionals'));
    }
}
