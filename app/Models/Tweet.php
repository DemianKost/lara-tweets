<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\UUID;
use App\Models\User;
use App\Models\Like;

class Tweet extends Model
{
    use HasFactory, UUID;
    
    protected $guarded = [];

    /**
     * Boot method
     */
    protected static function booting(): void
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'DESC');
        });
    }

    /**
     * User that created tweet
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Likes of tweet
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Has liked current user check
     */
    public function hasLiked()
    {
        return $this->likes()
            ->where('likeable_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->first();
    }
}
