<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Pemilu OSIS 2024',
            'description' => 'Pemilihan ketua dan wakil OSIS.',
            'location' => 'Aula',
            'date' => now()->addDays(3),
            'time' => '09:00:00',
            'created_by' => 1
        ]);
    }
}
