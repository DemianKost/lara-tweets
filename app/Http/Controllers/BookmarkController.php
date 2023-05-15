<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Bookmark;
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
}
