<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Like extends Model
{
    use HasFactory, UUID;

    protected $guarded = [];
    
    /**
     * Liked entity
     */
    public function liked()
    {
        return $this->morphTo();
    }
}
