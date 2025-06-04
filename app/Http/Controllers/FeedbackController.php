<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class FeedbackController extends Controller
{
    public function index()
    {
        $title = 'Feedback Form';

        return view('feedback', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000', // Atau 'content' jika Anda pilih Opsi B
        ]);

        Aspiration::create([
            'user_id' => FacadesAuth::id(), // <-- TAMBAHKAN INI
            'subject' => $request->subject,
            'message' => $request->message, // Atau 'content'
        ]);

        return back()->with('success', 'Thank you for your feedback!');
    }
}
