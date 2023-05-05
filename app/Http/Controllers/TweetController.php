<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tweet\StoreTweetRequest;
use App\Models\Tweet;

class TweetController extends Controller
{
    /**
     * Store tweet
     * @param App\Http\Requests\Tweet\StoreTweetRequest $request
     * 
     * @return void
     */
    public function store(StoreTweetRequest $request)
    {
        $data = $request->validated();

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $data['body']
        ]);
    }
}
