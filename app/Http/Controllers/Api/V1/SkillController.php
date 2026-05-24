<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\SkillServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Skill\IndexSkillRequest;
use App\Http\Resources\Api\V1\SkillResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class SkillController extends Controller
{
    public function __construct(
        private readonly SkillServiceInterface $skillService,
    ) {
    }

    public function index(IndexSkillRequest $request): AnonymousResourceCollection
    {
        return SkillResource::collection(
            $this->skillService->getSkills($request->validated()),
        );
    }
}
