<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\KnowledgeResourceServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\KnowledgeResource\IndexKnowledgeResourceRequest;
use App\Http\Resources\Api\V1\KnowledgeResourceResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class KnowledgeResourceController extends Controller
{
    public function __construct(
        private readonly KnowledgeResourceServiceInterface $knowledgeResourceService,
    ) {
    }

    public function index(IndexKnowledgeResourceRequest $request): AnonymousResourceCollection
    {
        return KnowledgeResourceResource::collection(
            $this->knowledgeResourceService->getKnowledgeResources($request->validated()),
        );
    }
}
