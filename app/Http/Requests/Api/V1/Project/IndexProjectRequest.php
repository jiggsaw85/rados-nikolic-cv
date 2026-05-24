<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Project;

use Illuminate\Foundation\Http\FormRequest;

final class IndexProjectRequest extends FormRequest
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
            'technology' => [
                'sometimes',
                'string',
                'max:100',
            ],
            'featured' => [
                'sometimes',
                'in:true,false,1,0',
            ],
        ];
    }
}
