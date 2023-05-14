<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\Tweet;
use App\Models\Follower;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Boot function
     */
    protected static function booting(): void
    {
        static::created(function ($user) {
            Profile::create([
                'user_id' => $user->id,
                'username' => 'user' . Str::random(20)
            ]);
        });
    }

    /**
     * Profile of user
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Tweets created by current user
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * Followers of current user
     */
    public function followers()
    {
        return $this->morphMany(Follower::class, 'followable')->select('follower_id');
    }

    /**
     * Followings of current user
     */
    public function following()
    {
        return $this->morphMany(Follower::class, 'follower')->select('followable_id');
    }

    /**
     * Check following user by id
     * 
     * @return boolean
     */
    public function isFollowing()
    {
        return $this->followers()
            ->where('follower_id', auth()->id())
            ->where('followable_id', $this->id)
            ->exists();
    }

    /**
     * Follow user by current user
     * 
     * @return void
     */
    public function follow()
    {
        $this->followers()
            ->create([
                'follower_type' => 'App\Models\User',
                'follower_id' => auth()->id(),
                'followable_type' => 'App\Models\User',
                'followable_id' => $this->id
            ]);
    }

    /**
     * Unfollow user by current user
     * 
     * @return void
     */
    public function unfollow()
    {
        $this->followers()
            ->where('follower_id', auth()->id())
            ->where('followable_id', $this->id)
            ->delete();
    }
}
