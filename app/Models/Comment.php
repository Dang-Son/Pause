<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'song_id',
        'user_id'
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function user()
    {
        return $this->belongsTo((User::class));
    }
}
