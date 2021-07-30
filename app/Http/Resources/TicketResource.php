<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'replies' => ReplyResource::collection($this->whenLoaded('replies')),
            'severity' => $this->severity,
            'images' => $this->images ? explode('|', $this->images) : null,
            'closed_at' => Carbon::parse($this->closed_at)->diffForHumans(),
            'status' => $this->when($this->isClosed(), 'Closed', 'Open')
        ];
    }
}
