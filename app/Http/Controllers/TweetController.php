<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Actions\Tweet\CreateTweet;
use App\Actions\Tweet\LikeTweet;
use App\Http\Requests\Tweet\StoreTweetRequest;
use App\Http\Resources\Tweet\TweetResource;
use Illuminate\Support\Facades\Storage;

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

        CreateTweet::run( $data );
    }

    /**
     * Show tweet by id
     * @param App\Models\Tweet $tweet
     * 
     * @return Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        return Inertia::render('Tweet/Show', [
            'tweet' => new TweetResource( $tweet )
        ]);
    }

    /**
     * Like tweet
     * @param App\Models\Tweet $tweet
     * 
     * @return void
     */
    public function like(Tweet $tweet)
    {
        LikeTweet::run( $tweet );
    }
    
    /**
     * Respond for tweet
     * @param App\Http\Requests\Tweet\StoreTweetRequest $request
     * 
     * @return void
     */
    public function respond(Tweet $tweet, StoreTweetRequest $request)
    {
        $data = $request->validated();

        CreateTweet::run( $data, $tweet->id );
    }
}
