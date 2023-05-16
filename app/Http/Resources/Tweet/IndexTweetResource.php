<?php

namespace App\Http\Resources\Tweet;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Models\Bookmark;

class IndexTweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'name' => $this->user->name,
                'username' => $this->user->profile->username
            ],
            'body' => $this->body,
            'likes' => $this->likes()->count(),
            'child_count' => $this->children()->count(),
            'bookmarked' => Bookmark::where('user_id', auth()->id())
                ->where('tweet_id', $this->id)
                ->exists(),
            'created_at' => Carbon::parse( $this->created_at )->diffForHumans()
        ];
    }
}
