<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function artist()
    {
        Log::error('go here artist');
        return $this->hasOne(Artist::class);
    }

    public function playlist()
    {
        return $this->hasMany(Playlist::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followed_artists()
    {
        Log::error('go here');
        return $this->hasMany(Artist::class);
    }
}
