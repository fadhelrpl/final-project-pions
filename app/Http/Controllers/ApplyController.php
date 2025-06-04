<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Enums\Position; // Import Position enum
use App\Models\MemberApplication;

class ApplyController extends Controller
{
    public function index()
    {
        $title = 'Apply to PIONS';
        return view('apply', compact('title')); // Pastikan view ini ada di resources/views/apply.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'preferred_position' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, Position::cases()))],
            'motivation' => 'required|string|min:50|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Max 5MB
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('application_photos', 'public');
        }

        MemberApplication::create([
            'user_id' => Auth::id(),
            'preferred_position' => $request->preferred_position,
            'motivation' => $request->motivation,
            'photo_path' => $photoPath,
            'status' => 'pending', // Default status
        ]);

        // 4. Redirect dengan Pesan Sukses
        return redirect()->route('apply')->with('success', 'Your application has been submitted successfully!');
    }
}