<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideoWatched extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'video_id'];

    // Explicitly specify the table name if it doesn't follow Laravel's convention
    protected $table = 'user_video_watched';
}


 
 
