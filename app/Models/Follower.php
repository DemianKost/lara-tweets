<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follower extends Model
{
    use HasFactory;

    /**
     * User that is following
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
