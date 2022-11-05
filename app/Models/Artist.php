<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'followed', 'user_id'];


    // Default value 
    protected $attributes = [
        'followed' => 0,
    ];


    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
