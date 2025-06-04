<?php

namespace Database\Factories;

use App\Models\PionsPosition;
use App\Models\Member; // <<< Import model Member
use App\Enums\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class PionsPositionFactory extends Factory
{
    protected $model = PionsPosition::class;

    public function definition(): array
    {
        $allPositions = Position::options();

        return [
            'member_id' => Member::factory(), // Menggunakan Member::factory() untuk membuat atau mengambil Member
            'position' => Arr::random(array_keys($allPositions)),
            'period' => $this->faker->year(),
        ];
    }

    public function withPosition(Position $positionEnum): static
    {
        return $this->state(fn(array $attributes) => [
            'position' => $positionEnum->value,
        ]);
    }

    public function withMember(Member $member): static // Menggunakan Member sebagai tipe
    {
        return $this->state(fn(array $attributes) => [
            'member_id' => $member->id,
        ]);
    }
}