<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company' => $this->company,
            'role' => $this->role,
            'employment_type' => $this->employment_type,
            'location' => $this->location,
            'period' => [
                'start_date' => $this->start_date?->toDateString(),
                'end_date' => $this->end_date?->toDateString(),
                'is_current' => $this->is_current,
            ],
            'summary' => $this->summary,
            'responsibilities' => $this->responsibilities,
            'technologies' => $this->technologies,
            'sort_order' => $this->sort_order,
        ];
    }
}
