<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
            'category_id' => 'sometimes',
            'body' => 'sometimes|string',
            'excerpt' => 'sometimes',
            'featured_image' => 'sometimes|image',
            'is_published' => 'sometimes|boolean',
        ];
    }
}
