<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Education;

use Illuminate\Foundation\Http\FormRequest;

final class IndexEducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
