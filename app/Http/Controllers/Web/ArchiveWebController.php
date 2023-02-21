<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveWebController extends Controller
{
    public function index()
    {
        $archives = Archive::all();
        return view('web.archives', compact('archives'));
    }
}
