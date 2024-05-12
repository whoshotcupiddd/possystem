<?php

namespace App\Http\Controllers;

use App\Models\YourModel; // Import your model

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::findOrFail($id); // Using the Profile model
        return view('profile.show', compact('profile'));
    }
}