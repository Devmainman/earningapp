<?php

// app/Http/Controllers/WalletController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile'); // Ensure you have wallet.blade.php in resources/views
    }
}
