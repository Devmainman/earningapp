<?php

// app/Http/Controllers/WalletController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        return view('wallet'); // Ensure you have wallet.blade.php in resources/views
    }
}
