<?php

namespace App\Http\Resources\Bookmark;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tweet\TweetResource;

class BookmarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tweet' => new TweetResource( $this->tweet )
        ];
    }
}
