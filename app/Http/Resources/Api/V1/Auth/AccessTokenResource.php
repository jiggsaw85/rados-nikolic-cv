<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AccessTokenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $token = $this->resource;

        return [
            'access_token' => $token->accessToken,
            'token_type' => $token->tokenType,
            'expires_at' => $token->expiresAt?->toISOString(),
            'abilities' => $token->abilities,
        ];
    }
}
