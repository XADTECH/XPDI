<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'nullable|integer|exists:courses,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'instructor_id' => 'nullable|integer|exists:users,id',
            'parent_id' => 'nullable|integer',
            'subject' => 'nullable|string|max:255',
            'question' => 'required|string|min:10',
        ];
    }
}
