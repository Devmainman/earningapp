<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ClientVideo; // Use the correct model
use App\Models\LinkedInPost; // Import the LinkedInPost model

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        // Fetch videos from the database
        $videos = ClientVideo::all()->map(function ($video) {
            // Extract the video ID from the URL
            parse_str(parse_url($video->youtube_url, PHP_URL_QUERY), $params);
            $video->video_id = $params['v'] ?? basename(parse_url($video->youtube_url, PHP_URL_PATH));
            return $video;
        });
         
        // Fetch LinkedIn posts from the database
    $linkedinPosts = LinkedInPost::all();

    // Pass the videos and LinkedIn posts to the view
    return view('dashboard', ['videos' => $videos, 'linkedinPosts' => $linkedinPosts]);
        
   
       
    }

    
    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
