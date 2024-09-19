<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkedInPost;

class LinkedInPostController extends Controller
{
    // Store the LinkedIn URL
    public function store(Request $request)
    {
        // Validate the LinkedIn URL
        $request->validate([
            'linkedin_url' => 'required|url'
        ]);

        // Create a new LinkedIn post record
        LinkedInPost::create([
            'url' => $request->linkedin_url,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'LinkedIn URL successfully uploaded.');
    }

    public function showDashboard()
{
    $linkedinPosts = LinkedInPost::all(); // Fetch posts from the database
    return view('dashboard', compact('linkedinPosts'));
}

    // Optionally, you can add other methods such as index, show, etc.
}
