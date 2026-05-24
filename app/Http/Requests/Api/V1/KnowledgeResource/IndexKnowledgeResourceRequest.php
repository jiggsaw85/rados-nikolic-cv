<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\KnowledgeResource;

use Illuminate\Foundation\Http\FormRequest;

final class IndexKnowledgeResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => [
                'sometimes',
                'string',
                'max:100',
            ],
            'status' => [
                'sometimes',
                'string',
                'max:100',
            ],
        ];
    }
}
