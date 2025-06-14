<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = ['id'];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
