<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageSettingRequest extends FormRequest
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

            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_mission' => 'nullable|string',
            'about_instruction' => 'nullable|string',
            'about_image' => 'nullable',
            'map_link' => 'nullable|max:5055',
            'faq' => 'nullable|json',
        ];
    }
}
