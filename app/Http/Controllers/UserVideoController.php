<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientVideo;
use Illuminate\Support\Facades\Auth;
use App\Models\UserVideoWatched;


class UserVideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'youtube_url' => 'required|url',
        ]);

        $video = ClientVideo::create([
            'client_id' => Auth::id(),
            'youtube_url' => $request->youtube_url,
        ]);

        \Log::info('Video Uploaded:', ['video' => $video]);

        return redirect()->route('client.dashboard')->with('success', 'Video URL uploaded successfully.');
    }

    public function watch(Request $request, $id)
    {
        $video = ClientVideo::find($id);

        if (!$video) {
            return response()->json(['success' => false, 'message' => 'Video not found.'], 404);
        }

        $user = Auth::user();

        // Check if the user has already watched this video
        $alreadyWatched = $user->watchedVideos()->where('video_id', $id)->exists();

        if ($alreadyWatched) {
            return response()->json(['success' => false, 'message' => 'You have already watched this video.']);
        }

        // Update user balance after watching the video
        $user->balance += 1; // Adjust the balance increment as needed
        $user->save();

        // Mark the video as watched by attaching it to the user's watched videos
        $user->watchedVideos()->attach($id);

        return response()->json([
            'success' => true,
            'message' => 'Video marked as watched. Your balance has been updated.',
            'new_balance' => $user->balance
        ]);
    }

    public function markAsWatched($videoId)
    {
        $userId = auth()->id();
    
        // Check if the user already marked this video as watched
        $watched = UserVideoWatched::where('user_id', $userId)
                                   ->where('video_id', $videoId)
                                   ->first();
    
        if ($watched) {
            return response()->json(['message' => 'Video already marked as watched.'], 400);
        }
    
        // Mark as watched
        UserVideoWatched::create([
            'user_id' => $userId,
            'video_id' => $videoId,
        ]);
    
        return response()->json(['message' => 'Video marked as watched.']);
    }
    
    public function increaseBalance($videoId)
    {
        $userId = auth()->id();
    
        // Check if the video was watched by the user
        $watched = UserVideoWatched::where('user_id', $userId)
                                   ->where('video_id', $videoId)
                                   ->first();
    
        if (!$watched) {
            return response()->json(['message' => 'You need to watch the video first.'], 400);
        }
    
        // Increase user balance (assuming a User model has a balance column)
        $user = auth()->user();
        $user->balance += 10; // Adjust this value as needed
        $user->save();
    
        return response()->json(['message' => 'Balance increased successfully.']);
    }
    

  





}





