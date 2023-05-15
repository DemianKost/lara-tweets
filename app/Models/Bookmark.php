<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\User;
use App\Models\Tweet;

class Bookmark extends Model
{
    use HasFactory, UUID;

    /**
     * User that owns bookmark
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Bookmark tweet
     */
    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id');
    }
}
