<?php

namespace App\Actions\Follower;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Profile;

class FollowUser
{
    use AsAction;

    public function handle( Profile $profile )
    {
        if ( $profile->user->isFollowing() ) {
            $profile->user->unfollow();
        } else {
            $profile->user->follow();
        }
    }
}
