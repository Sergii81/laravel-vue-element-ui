<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PropertySearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'nullable'],
            'bedrooms' => ['sometimes', 'integer', 'nullable'],
            'bathrooms' => ['sometimes', 'integer', 'nullable'],
            'storeys' => ['sometimes', 'integer', 'nullable'],
            'garages' => ['sometimes', 'integer', 'nullable'],
            'price_min' => ['sometimes', 'integer', 'nullable'],
            'price_max' => ['sometimes', 'integer', 'nullable'],
        ];
    }
}
