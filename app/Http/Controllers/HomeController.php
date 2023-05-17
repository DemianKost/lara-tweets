<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Resources\Tweet\IndexTweetResource;

class HomeController extends Controller
{
    /**
     * Homepage with latests tweets
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $following = auth()->user()->following()->get(10);
        $userIds = [];

        foreach ( $following as $user ) {
            $userIds[] = $user->followable_id;
        }

        $tweets = IndexTweetResource::collection( Tweet::whereIn('user_id', $userIds)->get() );

        return Inertia::render('Home/Index', [
            'tweets' => $tweets
        ]);
    }

    /**
     * Explore page
     * 
     * @return Illuminate\Http\Response
     */
    public function explore()
    {
        
    }
}
