<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClientVideo;
use Illuminate\Http\Request;
use Auth;

class ClientVideoController extends Controller
{
    public function create()
    {
        return view('client.upload_video');
    }

    public function store(Request $request)
    {
        $request->validate([
            'youtube_url' => 'required|url'
        ]);

        ClientVideo::create([
            'client_id' => Auth::id(),
            'youtube_url' => $request->youtube_url
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Video URL uploaded successfully.');
    }
}
