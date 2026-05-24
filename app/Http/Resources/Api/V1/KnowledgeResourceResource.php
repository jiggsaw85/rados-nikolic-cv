<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class KnowledgeResourceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'type' => $this->type,
            'status' => $this->status,
            'description' => $this->description,
            'url' => $this->url,
            'pages_count' => $this->pages_count,
            'audience' => $this->audience,
            'highlights' => $this->highlights,
            'sort_order' => $this->sort_order,
        ];
    }
}
