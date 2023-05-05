<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\User;

class Tweet extends Model
{
    use HasFactory, UUID;
    
    protected $guarded = [];

    /**
     * User that created tweet
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
