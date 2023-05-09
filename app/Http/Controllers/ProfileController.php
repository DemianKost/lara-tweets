<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Profile;
use App\Http\Resources\Profile\ProfileResource;
use App\Http\Resources\Tweet\TweetResource;

class ProfileController extends Controller
{
    /**
     * Current user profile page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Profile/Index', [
            'profile' => new ProfileResource( auth()->user()->profile ),
            'tweets' => TweetResource::collection( auth()->user()->tweets()->where('parent_id', NULL)->get() )
        ]);
    }

    /**
     * Show user profile by id
     * @param App\Models\Profile $profile
     * 
     * @return Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return Inertia::render('Profile/Show', [
            'profile' => new ProfileResource( $profile ),
            'tweets' => TweetResource::collection( $profile->user->tweets )
        ]);
    }
}
