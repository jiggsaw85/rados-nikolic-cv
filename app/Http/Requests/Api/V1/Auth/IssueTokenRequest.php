<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

final class IssueTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => [
                'required',
                'string',
                'max:100',
            ],
            'client_secret' => [
                'required',
                'string',
                'max:255',
            ],
            'device_name' => [
                'nullable',
                'string',
                'max:100',
            ],
        ];
    }
}
