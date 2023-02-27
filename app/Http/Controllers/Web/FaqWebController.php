<?php

namespace App\Http\Controllers\Web;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqWebController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('web.faqs', compact('faqs'));
    }
}
