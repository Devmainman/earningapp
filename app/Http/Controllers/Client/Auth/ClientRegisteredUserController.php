<?php


namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientRegisteredUserController extends Controller
{
    public function create()
    {
        // Return the client registration form view
        return view('client.auth.register');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Create a new client
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log in the newly created client
        Auth::guard('client')->login($client);

        // Redirect the client to their dashboard
        return redirect()->route('client.dashboard');
    }
}
