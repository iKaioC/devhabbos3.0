<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialClientController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')->get();
        return view('client.testimonial.index', compact('testimonials'));
    }
}
