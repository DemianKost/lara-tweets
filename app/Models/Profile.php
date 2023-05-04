<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\User;

class Profile extends Model
{
    use HasFactory, UUID;

    protected $guarded = [];

    /**
     * User of this profile
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
