<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['name_song','liked', 'views','category'];

    public function song(){
        return $this->belongsTo(Artist::class);
    }
}
