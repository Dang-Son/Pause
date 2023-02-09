<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'name', 'liked', 'views', 'category', 'imageURL', 'audioURL', 'playlist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
