<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['name_song', 'liked', 'views', 'category', 'artist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }


    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }


    // Like songs
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
