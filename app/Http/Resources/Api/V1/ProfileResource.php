<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'headline' => $this->headline,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'years_of_experience' => $this->years_of_experience,
            'avatar_path' => $this->avatar_path,
            'summary' => $this->summary,
            'description' => $this->description,
            'links' => $this->links,
            'languages' => $this->languages,
        ];
    }
}
