<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Experience;

use Illuminate\Foundation\Http\FormRequest;

final class ShowExperienceRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'experience' => $this->route('experience'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'experience' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
    }
}
