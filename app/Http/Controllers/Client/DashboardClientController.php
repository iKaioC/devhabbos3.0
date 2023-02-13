<?php

namespace App\Http\Controllers\Client;

use App\Models\Optional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardClientController extends Controller
{
    public function index()
    {

        return view('client.dashboard');
    }
}
