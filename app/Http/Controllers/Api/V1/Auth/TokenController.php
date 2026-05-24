<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Contracts\Services\AuthTokenServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\IssueTokenRequest;
use App\Http\Requests\Api\V1\Auth\RevokeTokenRequest;
use App\Http\Resources\Api\V1\Auth\AccessTokenResource;
use App\Models\ApiClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

final class TokenController extends Controller
{
    public function __construct(
        private readonly AuthTokenServiceInterface $authTokenService,
    ) {
    }

    public function store(IssueTokenRequest $request): JsonResponse
    {
        $token = $this->authTokenService->issueToken($request->validated());

        return (new AccessTokenResource($token))
            ->response()
            ->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    public function destroy(RevokeTokenRequest $request): Response
    {
        $apiClient = $request->user();

        if (! $apiClient instanceof ApiClient) {
            abort(HttpResponse::HTTP_UNAUTHORIZED);
        }

        $this->authTokenService->revokeCurrentToken($apiClient);

        return response()->noContent();
    }
}
