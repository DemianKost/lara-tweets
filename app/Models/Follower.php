<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Traits\UUID;

class Follower extends Model
{
    use HasFactory, UUID;

    protected $guarded = [];

    protected $table = 'followers';

    /**
     * User that is following
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * User that is following for follower
     */
    public function followedUser()
    {
        return $this->belongsTo(User::class, 'followable_id');
    } 
}
