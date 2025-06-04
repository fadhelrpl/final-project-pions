<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use App\Models\PionsPosition;
use App\Enums\Position;
use Spatie\Permission\Models\Role; // Import model Role

class PionsPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan role 'PIONS' ada
        $pionsRole = Role::firstOrCreate(['name' => 'PIONS']);

        // --- Bagian 1: Pastikan data Member ada di tabel 'members' ---
        // Gunakan firstOrCreate untuk menghindari duplikasi jika seeder dijalankan berkali-kali.
        // Sesuaikan 'name' atau 'user_id' sebagai kriteria pencarian unik.
        // Photo akan dikosongkan (null)

        $muhammadFadlanUser = User::firstOrCreate(
            ['email' => 'fadlan@pions.com'], // Menggunakan domain spesifik agar tidak bentrok dengan user lain
            ['name' => 'Muhammad Fadlan Rabbani J.', 'password' => bcrypt('password')]
        );
        $muhammadFadlanUser->assignRole($pionsRole); // Berikan role 'PIONS'

        $muhammadFadlan = Member::firstOrCreate(
            ['user_id' => $muhammadFadlanUser->id],
            [
                'name' => 'Muhammad Fadlan Rabbani J.',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        $azmiUser = User::firstOrCreate(
            ['email' => 'azmi@pions.com'],
            ['name' => 'Azmi Fauzan Akbar', 'password' => bcrypt('password')]
        );
        $azmiUser->assignRole($pionsRole);

        $azmiFauzan = Member::firstOrCreate(
            ['user_id' => $azmiUser->id],
            [
                'name' => 'Azmi Fauzan Akbar',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        $masaidUser = User::firstOrCreate(
            ['email' => 'masaid@pions.com'],
            ['name' => 'Masaid Fairus Trimarsongko', 'password' => bcrypt('password')]
        );
        $masaidUser->assignRole($pionsRole);

        $masaidFairus = Member::firstOrCreate(
            ['user_id' => $masaidUser->id],
            [
                'name' => 'Masaid Fairus Trimarsongko',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        $akbarUser = User::firstOrCreate(
            ['email' => 'akbar@pions.com'],
            ['name' => 'Akbar Rizki Pratama', 'password' => bcrypt('password')]
        );
        $akbarUser->assignRole($pionsRole);

        $akbarRizki = Member::firstOrCreate(
            ['user_id' => $akbarUser->id],
            [
                'name' => 'Akbar Rizki Pratama',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        $milanUser = User::firstOrCreate(
            ['email' => 'milan@pions.com'],
            ['name' => 'Milan Parade Siahaan', 'password' => bcrypt('password')]
        );
        $milanUser->assignRole($pionsRole);

        $milanParade = Member::firstOrCreate(
            ['user_id' => $milanUser->id],
            [
                'name' => 'Milan Parade Siahaan',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        // -- Division Leaders (dari image_33a831.jpg) --
        $arjunaUser = User::firstOrCreate(
            ['email' => 'arjuna@pions.com'],
            ['name' => 'Arjuna Lakeisha Attawan SDJ', 'password' => bcrypt('password')]
        );
        $arjunaUser->assignRole($pionsRole);

        $arjunaLakeisha = Member::firstOrCreate(
            ['user_id' => $arjunaUser->id],
            [
                'name' => 'Arjuna Lakeisha Attawan SDJ',
                'photo' => null, // Mengosongkan path foto
            ]
        );

        $yogaUser = User::firstOrCreate(
            ['email' => 'yoga@pions.com'],
            ['name' => 'Yoga Yoshio Suparman', 'password' => bcrypt('password')]
        );
        $yogaUser->assignRole($pionsRole);

        $yogaYoshio = Member::firstOrCreate(
            ['user_id' => $yogaUser->id],
            [
                'name' => 'Yoga Yoshio Suparman',
                'photo' => null,
            ]
        );

        $tubagusUser = User::firstOrCreate(
            ['email' => 'tubagus@pions.com'],
            ['name' => 'Tubagus Valentino .D .A', 'password' => bcrypt('password')]
        );
        $tubagusUser->assignRole($pionsRole);

        $tubagusValentino = Member::firstOrCreate(
            ['user_id' => $tubagusUser->id],
            [
                'name' => 'Tubagus Valentino .D .A',
                'photo' => null,
            ]
        );

        $ibnuUser = User::firstOrCreate(
            ['email' => 'ibnu@pions.com'],
            ['name' => 'Ibnu Alif Muhadzdzib', 'password' => bcrypt('password')]
        );
        $ibnuUser->assignRole($pionsRole);

        $ibnuAlif = Member::firstOrCreate(
            ['user_id' => $ibnuUser->id],
            [
                'name' => 'Ibnu Alif Muhadzdzib',
                'photo' => null,
            ]
        );

        $rmFadhelUser = User::firstOrCreate(
            ['email' => 'fadhel@pions.com'],
            ['name' => 'R.M. Fadhel Suradipraja', 'password' => bcrypt('password')]
        );
        $rmFadhelUser->assignRole($pionsRole);

        $rmFadhel = Member::firstOrCreate(
            ['user_id' => $rmFadhelUser->id],
            [
                'name' => 'R.M. Fadhel Suradipraja',
                'photo' => null,
            ]
        );

        $alvinUser = User::firstOrCreate(
            ['email' => 'alvin@pions.com'],
            ['name' => 'Alvin Zaidan Faisal Putra', 'password' => bcrypt('password')]
        );
        $alvinUser->assignRole($pionsRole);

        $alvinZaidan = Member::firstOrCreate(
            ['user_id' => $alvinUser->id],
            [
                'name' => 'Alvin Zaidan Faisal Putra',
                'photo' => null,
            ]
        );

        $rafieUser = User::firstOrCreate(
            ['email' => 'rafie@pions.com'],
            ['name' => 'Rafie Zubair Djohar', 'password' => bcrypt('password')]
        );
        $rafieUser->assignRole($pionsRole);

        $rafieZubair = Member::firstOrCreate(
            ['user_id' => $rafieUser->id],
            [
                'name' => 'Rafie Zubair Djohar',
                'photo' => null,
            ]
        );


        // --- Bagian 2: Isi tabel 'pions_positions' ---
        PionsPosition::firstOrCreate(
            ['member_id' => $muhammadFadlan->id, 'position' => Position::PRESIDENT->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $azmiFauzan->id, 'position' => Position::VICE_PRESIDENT->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $masaidFairus->id, 'position' => Position::SECRETARY->value],
            ['period' => '2025'] // Menggunakan '2025' konsisten
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $akbarRizki->id, 'position' => Position::TREASURER->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $milanParade->id, 'position' => Position::VICE_SECRETARY->value],
            ['period' => '2025']
        );

        // Data Division Leaders
        PionsPosition::firstOrCreate(
            ['member_id' => $arjunaLakeisha->id, 'position' => Position::MEDIA_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $yogaYoshio->id, 'position' => Position::EVENT_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $tubagusValentino->id, 'position' => Position::PR_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $ibnuAlif->id, 'position' => Position::CLEANLINESS_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $rmFadhel->id, 'position' => Position::UBUDIYYAH_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $alvinZaidan->id, 'position' => Position::EDUCATION_HEAD->value],
            ['period' => '2025']
        );

        PionsPosition::firstOrCreate(
            ['member_id' => $rafieZubair->id, 'position' => Position::SPORTS_HEAD->value],
            ['period' => '2025']
        );
    }
}