<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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

            'course_id'      => 'required|exists:courses,id', // Ensure course exists
            'user_id'        => 'required|exists:users,id',   // Ensure user exists
            'comment'        => 'required|string|max:7000',  // Limit comment length
            'rating'         => 'required|numeric|min:1|max:5', // Rating between 1 and 5
            'instructor_id'  => 'nullable|integer|exists:users,id', // Optional instructor
            'status'         => 'nullable|in:0,1',

        ];
    }
}
