<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\SummaryServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Summary\ShowSummaryRequest;
use App\Http\Resources\Api\V1\SummaryResource;

final class SummaryController extends Controller
{
    public function __construct(
        private readonly SummaryServiceInterface $summaryService,
    ) {
    }

    public function __invoke(ShowSummaryRequest $request): SummaryResource
    {
        return new SummaryResource($this->summaryService->getSummary());
    }
}
