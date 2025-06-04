<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'IDN School Holds Successful Environment Day Campaign!',
            'content' => 'Pamijahan, May 20, 2025 – OSIS SMK IDN Boarding School held a successful Environment Day Campaign last Saturday, May 17, 2025. The event was organized to raise awareness about environmental issues and promote sustainable habits among students.
                        The campaign featured various activities such as:
                        "Trash for Trees" Program: Students brought in plastic waste in exchange for tree seedlings.
                        Wall Mural Painting: Artistic students created a large environmental-themed mural on the school’s west wall.
                        Green Class Competition: Each class decorated their room with eco-friendly materials, and Class XI RPL B was crowned as the winner!
                        “Our goal is to educate and empower students to take real action for the environment. Seeing everyone so enthusiastic was really inspiring,” said [Name], the OSIS Chairman.
                        The event concluded with a short seminar by a local environmental activist and a symbolic tree planting ceremony in the school yard.
                        🟢 Let’s continue to make our school greener, together!',
            'author_id' => 1
        ]);
    }
}
