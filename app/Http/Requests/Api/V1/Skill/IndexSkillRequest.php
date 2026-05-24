<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Skill;

use Illuminate\Foundation\Http\FormRequest;

final class IndexSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => [
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
