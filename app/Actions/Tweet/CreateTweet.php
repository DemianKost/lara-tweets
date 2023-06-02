<?php

namespace App\Actions\Tweet;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Tweet;

class CreateTweet
{
    use AsAction;

    public function handle($data, $parent_id=null)
    {
        Tweet::create([
            'user_id' => auth()->user()->id,
            'parent_id' => $parent_id,
            'body' => $data['body']
        ]);
    }
}
