<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
            'reply_text' => $this->reply_text,
            'user' => $this->user->name,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
