<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $guarded = ['id'];

    public function voting()
    {
        return $this->belongsTo(Vote::class);
    }

}
