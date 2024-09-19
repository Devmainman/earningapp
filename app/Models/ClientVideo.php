<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientVideo extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'youtube_url'];

    public function usersWhoWatched()
{
    return $this->belongsToMany(User::class, 'user_video_watched', 'video_id', 'user_id');
}



}
