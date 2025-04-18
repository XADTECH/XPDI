<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

        $blogId = $this->route('blog');
        return [
            'blogcat_id' => 'required|integer|exists:blogcategories,id', // Ensure it references a valid blog category ID
            'post_title' => 'required|string|max:255|unique:blog_posts,post_title,' . $blogId, // Unique title, ignoring the current blog post
            'post_slug' => 'nullable|string|max:255|unique:blog_posts,post_slug,' . $blogId, // Optional unique slug, ignoring the current blog post
            'post_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048', // Optional image file with max size 2MB
            'long_descp' => 'nullable|string', // Optional long description
            'post_tags.*' => 'nullable|string|max:255', // Optional tags
        ];
    }
}
