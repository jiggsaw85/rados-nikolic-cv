<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\ProjectServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Project\IndexProjectRequest;
use App\Http\Requests\Api\V1\Project\ShowProjectRequest;
use App\Http\Resources\Api\V1\ProjectResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectServiceInterface $projectService,
    ) {
    }

    public function index(IndexProjectRequest $request): AnonymousResourceCollection
    {
        return ProjectResource::collection(
            $this->projectService->getProjects($request->validated()),
        );
    }

    public function show(ShowProjectRequest $request, string $project): ProjectResource
    {
        return new ProjectResource(
            $this->projectService->getProject($project),
        );
    }
}
