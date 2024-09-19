<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ClientVideo;
use App\Models\User;
use Auth;

class VideoWatchedController extends Controller
{
    public function markAsWatched(ClientVideo $video)
    {
        $user = Auth();
        
        // Increase the user's balance
        $user->balance += 10;  // Add any amount you want
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Video watched and balance updated!');
    }
}

