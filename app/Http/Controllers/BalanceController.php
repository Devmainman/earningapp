<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    // Method to update the user's balance
    public function updateBalance(Request $request)
    {
        $user = Auth::user();
        $user->balance += 1; // Increment balance by 1 (or any amount you want)
        $user->save();

        return response()->json([
            'success' => true,
            'new_balance' => $user->balance
        ]);
    }
}
