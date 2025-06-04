<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PionsPosition;
use App\Enums\Position;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';

        // Ambil data untuk bagian "Meet the leaders of pions division"
        $divisionLeaders = PionsPosition::with('member') // Menggunakan relasi 'member'
            ->whereIn('position', [
                Position::MEDIA_HEAD->value,
                Position::EDUCATION_HEAD->value,
                Position::EVENT_HEAD->value,
                Position::UBUDIYYAH_HEAD->value,
                Position::PR_HEAD->value,
                Position::CLEANLINESS_HEAD->value,
                Position::SPORTS_HEAD->value,
            ])
            ->get();

        // --- Perubahan ada di sini untuk bagian 'pillars' ---
        // 1. Ambil data 'pillars' tanpa pengurutan khusus dari DB
        $pillars = PionsPosition::with('member')
            ->whereIn('position', [
                Position::PRESIDENT->value,
                Position::VICE_PRESIDENT->value,
                Position::SECRETARY->value,
                Position::TREASURER->value,
                Position::VICE_SECRETARY->value,
            ])
            ->get(); // Hapus orderByRaw dari query database

        // 2. Definisikan urutan yang diinginkan dalam array PHP
        $desiredOrder = [
            Position::PRESIDENT->value,
            Position::VICE_PRESIDENT->value,
            Position::SECRETARY->value,
            Position::TREASURER->value,
            Position::VICE_SECRETARY->value,
        ];

        // 3. Urutkan koleksi $pillars menggunakan urutan yang diinginkan
        $pillars = $pillars->sortBy(function ($item) use ($desiredOrder) {
            $positionValue = $item->position->value;
            $index = array_search($positionValue, $desiredOrder);
            return ($index === false) ? count($desiredOrder) : $index; // Tempatkan yang tidak ditemukan di akhir
        })->values(); // Gunakan values() untuk mereset kunci array setelah pengurutan

        return view('home', compact('title', 'divisionLeaders', 'pillars'));
    }
}