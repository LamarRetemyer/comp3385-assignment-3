<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function create(){
        return view('clients.create');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'nullable|string',
            'address' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

       
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName(); 
            $file->move(public_path('companyLogos'), $filename);
            $validatedData['company_logo'] = 'companyLogos/' . $filename;       
           
        }

       
        $client = Client::create($validatedData);

       
        return redirect()->route('clients.create')->with('success', 'Client added successfully.');
    }


}
