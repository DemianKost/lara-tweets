<?php

namespace App\Http\Resources\Tweet;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
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
            'created_at' => Carbon::parse( $this->created_at )->diffForHumans()
        ];
    }
}
