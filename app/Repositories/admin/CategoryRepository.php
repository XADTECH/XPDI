<?php


namespace App\Repositories\admin;

use App\Models\Category;
use App\Traits\FileUploadTrait; // Import the FileUploadTrait

class CategoryRepository
{
    use FileUploadTrait; // Use the FileUploadTrait



    public function saveCategory($data, $photo)
    {
       $category = new Category();

        // Handle file uploads manually
        if ($photo) {
            $category->image = $this->uploadFile($photo, 'category', $category->photo);
        }

        // Manually assign other fields from $data
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        // Save the intro
        $category->save();

        return $category;
    }

    public function updateCategory($data, $photo, $id)
    {
       $category = Category::find($id);
        // Handle file uploads manually
        if ($photo) {
            $category->image = $this->uploadFile($photo, 'category', $category->photo);
        }

        // Manually assign other fields from $data
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        // Save the intro
        $category->save();

        return $category;
    }
}
