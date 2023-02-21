<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialClientController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $testimonials = Testimonial::where('user_id', $user->id)->get();
        return view('client.testimonial.index', compact('testimonials'));
    }
}
