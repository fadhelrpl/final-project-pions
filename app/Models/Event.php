<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'datetime',
    ];
    protected $appends = ['image_url'];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function booted()
    {
        static::creating(function ($events) {
            $events->slug = Str::slug($events->title);
        });

        static::updating(function ($events) {
            if ($events->isDirty('title')) {
                $events->slug = Str::slug($events->title);
            }
        });
    }
}
