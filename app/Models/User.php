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
        return $this->belongsToMany(Follower::class, 'user_id');
    }

    /**
     * Following of current user
     */
    public function following()
    {
        return $this->belongsToMany(Follower::class, 'follower_id');
    }
}
