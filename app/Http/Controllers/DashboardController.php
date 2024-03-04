<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {   
        $clients = Client::all();
        return view('dashboard', compact('clients'));
    }
}
