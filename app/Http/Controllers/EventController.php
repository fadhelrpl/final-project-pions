<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $title = 'Event';

        $events = Event::with('creator')
            ->latest('date')
            ->get();

        return view('event', compact('events', 'title'));
    }

    public function show($slug)
    {
        $events = Event::where('slug', $slug)->with('creator')->firstOrFail();
        $title = $events->title;

        return view('event_details', compact('events', 'title'));
    }

    public function join(Event $event)
    {
        $user = Auth::user();

        // Cek apakah user sudah join
        $existing = Participant::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($existing) {
            return back()->with('message', 'Kamu sudah join event ini.');
        }

        Participant::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'status' => 'pending',
        ]);

        return back()->with('message', 'Berhasil join event. Menunggu persetujuan.');
    }
}
