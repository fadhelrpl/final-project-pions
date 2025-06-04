<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Member extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function rules(): array
    {
        return [
            'user_id' => ['required', Rule::unique('members', 'user_id')],
            // other rules...
        ];
    }
    /**
     * Get the positions for the member.
     */
    public function pionsPositions()
    {
        return $this->hasMany(PionsPosition::class, 'member_id');
    }
}
