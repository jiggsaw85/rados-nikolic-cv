<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Experience;

use Illuminate\Foundation\Http\FormRequest;

final class IndexExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company' => [
                'sometimes',
                'string',
                'max:150',
            ],
            'technology' => [
                'sometimes',
                'string',
                'max:100',
            ],
            'current' => [
                'sometimes',
                'in:true,false,1,0',
            ],
            'sort' => [
                'sometimes',
                'in:sort_order,-sort_order,start_date,-start_date',
            ],
        ];
    }
}
