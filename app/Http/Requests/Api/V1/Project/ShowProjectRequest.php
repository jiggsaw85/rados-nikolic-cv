<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Project;

use Illuminate\Foundation\Http\FormRequest;

final class ShowProjectRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'project' => $this->route('project'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project' => [
                'required',
                'string',
                'max:150',
                'regex:/^[A-Za-z0-9\-_]+$/',
            ],
        ];
    }
}
