<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class PostUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'exists:posts,id',
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:10',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
