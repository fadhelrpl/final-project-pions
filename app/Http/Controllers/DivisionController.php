<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PionsPosition;
use App\Enums\Position;
use App\Models\Member; // Import model Member

class DivisionController extends Controller
{
    public function show(string $slug)
    {
        $title = ucfirst(str_replace('-', ' ', $slug)) . ' Division'; // Membuat judul dari slug, misal "Public Relation Division"

        // Menentukan posisi berdasarkan slug
        $divisionHeadPosition = null;
        $memberPositions = [];

        // Anda perlu memetakan slug ke ENUM Position yang sesuai
        switch ($slug) {
            case 'media':
                $divisionHeadPosition = Position::MEDIA_HEAD;
                $memberPositions = [Position::MEDIA_MEMBER]; // Contoh, jika ada role member khusus
                break;
            case 'education':
                $divisionHeadPosition = Position::EDUCATION_HEAD;
                $memberPositions = [Position::EDUCATION_MEMBER];
                break;
            case 'event':
                $divisionHeadPosition = Position::EVENT_HEAD;
                $memberPositions = [Position::EVENT_MEMBER];
                break;
            case 'ubudiyyah':
                $divisionHeadPosition = Position::UBUDIYYAH_HEAD;
                $memberPositions = [Position::UBUDIYYAH_MEMBER];
                break;
            case 'pr':
                $divisionHeadPosition = Position::PR_HEAD;
                $memberPositions = [Position::PR_MEMBER]; // Ini yang akan kita gunakan untuk PR
                break;
            case 'cleanliness':
                $divisionHeadPosition = Position::CLEANLINESS_HEAD;
                $memberPositions = [Position::CLEANLINESS_MEMBER];
                break;
            case 'sports':
                $divisionHeadPosition = Position::SPORTS_HEAD;
                $memberPositions = [Position::SPORTS_MEMBER];
                break;
            // Tambahkan case lain jika ada divisi lain
            default:
                // Jika slug tidak ditemukan, bisa redirect atau tampilkan 404
                abort(404, 'Division not found.');
        }

        // Ambil leader divisi
        $leader = PionsPosition::with('member')
            ->where('position', $divisionHeadPosition->value)
            ->first();

        // Ambil anggota divisi (misal untuk PR members)
        // Kita asumsikan 'PR_MEMBER' adalah posisi untuk anggota di divisi PR.
        // Jika tidak ada posisi member spesifik, Anda bisa filter berdasarkan role user atau kriteria lain.
        $members = PionsPosition::with('member')
            ->whereIn('position', $memberPositions) // Ambil anggota dengan posisi yang ditentukan
            ->get();

        // Jika tidak ada anggota spesifik, Anda bisa juga mengambil semua member yang belum menjadi leader.
        // ATAU, jika Anda tidak memiliki enum member spesifik, Anda bisa buat anggota secara manual di seeder
        // dan filter di sini, atau hanya menampilkan yang ada.
        // Untuk tujuan demonstrasi "jika tidak ada data":
        // $members = collect([]); // Ini untuk simulasi tidak ada member

        return view('department', compact('title', 'slug', 'leader', 'members'));
    }
}