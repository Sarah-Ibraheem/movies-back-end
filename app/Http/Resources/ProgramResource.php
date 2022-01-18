<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'title'  => $this->title,
            'category'  =>  $this->category,
            'video_url'  => $this->video_url,
            'production_year'  => $this->production_year,
            'director'  => $this->director,
            'subtitle_language'  => $this->subtitle_language,
            'Original_language'  => $this->Original_language,
            'image'  => $this->image,
            'duration'  => $this->duration,
            'evaluation'  => $this->evaluation,
            'long_description'  => $this->long_description,
            'short_description'  => Str::substr($ $this->long_description, 0, 25),
            ];
    }
}
