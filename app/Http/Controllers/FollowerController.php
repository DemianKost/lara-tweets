<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Actions\Follower\FollowUser;

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
        FollowUser::run( $profile );
    }
}
