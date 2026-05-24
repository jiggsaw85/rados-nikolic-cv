<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class SummaryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'profile' => new ProfileResource($this->resource['profile']),
            'totals' => $this->resource['totals'],
            'top_skills' => SkillResource::collection($this->resource['top_skills']),
            'latest_experiences' => ExperienceResource::collection($this->resource['latest_experiences']),
            'featured_projects' => ProjectResource::collection($this->resource['featured_projects']),
        ];
    }
}
