<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Position; // Import Enum Position

class PionsPosition extends Model
{
    use HasFactory;

    protected $table = 'pions_positions';

    protected $guarded = ['id'];

    protected $casts = [
        'position' => Position::class, // Casting ke enum Position
    ];

    /**
     * Get the member associated with the position.
     */
    public function member() // Relasi ke model Member
    {
        return $this->belongsTo(Member::class);
    }
}