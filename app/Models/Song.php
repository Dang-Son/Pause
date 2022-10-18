<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['name_song', 'liked', 'views', 'category'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

<<<<<<< HEAD
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
=======

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
>>>>>>> origin/main
    }


    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
    }
}
