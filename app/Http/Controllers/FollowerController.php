<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Profile;

class FollowerController extends Controller
{
    /**
     * Follow user by current user
     * @param Illuminate\Http\Request $request
     * 
     * @return void
     */
    public function follow(Profile $profile, Request $request)
    {
        if ( $profile->user->isFollowing() ) {
            $profile->user->unfollow();
        } else {
            $profile->user->follow();
        }
    }
}
