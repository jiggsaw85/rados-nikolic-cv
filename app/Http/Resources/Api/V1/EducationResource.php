<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class EducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'institution' => $this->institution,
            'program' => $this->program,
            'location' => $this->location,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'sort_order' => $this->sort_order,
        ];
    }
}
