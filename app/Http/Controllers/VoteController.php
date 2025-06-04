<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $votings = Voting::where('is_active', true)
            ->orderBy('start_at', 'desc')
            ->get();

        $title = 'Selection List';

        return view('voting', compact('votings', 'title'));
    }

    public function show(Voting $voting) // Menggunakan Route Model Binding
    {
        $title = 'Candidate List';

        if (!$voting->is_active || $voting->start_at > now() || ($voting->end_at && $voting->end_at < now())) {
            // Jika voting tidak aktif atau di luar periode, redirect atau tampilkan error
            return redirect()->route('votings.index')->with('error', 'Voting ini tidak aktif atau sudah berakhir.');
        }

        $allUsersCanBeVoted = User::role('PIONS')->get(); // Ambil semua user yang memiliki role 'PIONS'

        // Periksa apakah user yang sedang login sudah memberikan suara di voting ini
        $userHasVoted = false;
        if (Auth::check()) {
            $userHasVoted = Auth::user()->votes()->where('voting_id', $voting->id)->exists();
        }

        return view('voting-details', compact('voting', 'allUsersCanBeVoted', 'userHasVoted','title'));
    }

    public function vote(Request $request, Voting $voting)
    {
        // Validasi request
        $request->validate([
            'candidate_id' => 'required|exists:users,id', // Pastikan candidate_id adalah user_id yang valid
        ]);

        // Pastikan user login
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Anda harus login untuk memberikan suara.');
        }

        // Pastikan voting aktif dan dalam periode voting
        if (!$voting->is_active || $voting->start_at > now() || ($voting->end_at && $voting->end_at < now())) {
            return redirect()->back()->with('error', 'Voting ini tidak aktif atau sudah berakhir.');
        }

        // Pastikan user belum memberikan suara di voting ini
        if (Auth::user()->votes()->where('voting_id', $voting->id)->exists()) {
            return redirect()->back()->with('error', 'Anda sudah memberikan suara untuk voting ini.');
        }

        // Simpan suara
        Auth::user()->votes()->create([
            'voting_id' => $voting->id,
            'candidate_id' => $request->candidate_id,
        ]);

        return redirect()->back()->with('success', 'Suara Anda berhasil disimpan!');
    }
}
