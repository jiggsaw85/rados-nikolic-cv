<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class EducationOverviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'education' => EducationResource::collection($this->resource['education']),
            'certifications' => CertificationResource::collection($this->resource['certifications']),
        ];
    }
}
