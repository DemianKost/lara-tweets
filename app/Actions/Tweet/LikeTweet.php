<?php

namespace App\Actions\Tweet;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Tweet;

class LikeTweet
{
    use AsAction;

    public function handle(Tweet $tweet)
    {
        $checkLike = $tweet->hasLiked();

        if ( $checkLike ) {
            $checkLike->delete();
        } else {
            $tweet->likes()->create([
                'likeable_id' => $tweet->id,
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
