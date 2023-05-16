<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Tweet;
use App\Http\Resources\Bookmark\BookmarkResource;

class BookmarkController extends Controller
{
    /**
     * Bookmarks of current user
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = BookmarkResource::collection( auth()->user()->bookmarks()->get() );

        return Inertia::render('Bookmark/Index', [
            'tweets' => $tweets
        ]);
    }

    /**
     * Bookmark a tweet by id
     * @param App\Models\Tweet $tweet
     * 
     * @return void
     */
    public function bookmark(Tweet $tweet)
    {
        $bookmarkExist = Bookmark::where('user_id', auth()->id())
            ->where('tweet_id', $tweet->id)
            ->first();

        if ( $bookmarkExist ) {
            $bookmarkExist->delete();
        } else {
            Bookmark::create([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id
            ]);
        }
    }
}
