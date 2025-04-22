<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'caption' => $this->caption,
            'location' => $this->location,
            'created_at' => Carbon::parse($this->created_at)->shortAbsoluteDiffForHumans(),
            'user' => $this->user,
            'media' => $this->media,
            'likes' => $this->likes
        ];
    }
}
