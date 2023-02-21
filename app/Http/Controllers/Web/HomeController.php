<?php

namespace App\Http\Controllers\Web;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')->get()->unique('user_id');
        return view('web.home', compact('testimonials'));
    }
}
