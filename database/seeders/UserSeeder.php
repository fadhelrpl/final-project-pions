<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        // User::create([
        //     'name' => 'Tubagus Valentino Dwi Amarta',
        //     'email' => 'tubagusvalentino@pions.id',
        //     'password' => bcrypt('12345678'),
        // ]);

        // User::create([
        //     'name' => 'Muhammad Fadlan Rabani Juhana',
        //     'email' => 'muhammadfadlan@pions.id',
        //     'password' => bcrypt('12345678'),
        // ]);

        // User::create([
        //     'name' => 'Akbar Rizki Pratama',
        //     'email' => 'akbarrizki@pions.id',
        //     'password' => bcrypt('12345678'),
        // ]);
    }
}
