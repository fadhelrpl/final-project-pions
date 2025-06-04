<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Participant::create([
        //     'user_id' => '1',
        //     'event_id' => '2',
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);

        $this->call([
            PionsPositionSeeder::class,
            EventSeeder::class,
            RoleSeeder::class,
            NewsSeeder::class,
        ]);

    }
}
