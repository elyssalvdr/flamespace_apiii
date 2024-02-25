<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'start_time',
        'end_time'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($schedule) {
            $schedule->reference_number = uniqid('schedule_');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
