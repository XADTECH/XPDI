<?php


namespace App\Repositories\admin;

use App\Models\SubCategory;

class SubCategoryRepository
{

    // New findSubCategory function
    public function findSubCategory($id)
    {
        return SubCategory::find($id);
    }


    public function saveSubCategory($data)
    {
       $sub_category = new SubCategory();


        // Manually assign other fields from $data
        $sub_category->category_id = $data['category_id'];
        $sub_category->name = $data['name'];
        $sub_category->slug = $data['slug'];

        // Save the intro
        $sub_category->save();

        return $sub_category;
    }

    public function updateSubCategory($data, $id)
    {
        $sub_category = $this->findSubCategory($id);

        // Manually assign other fields from $data
        $sub_category->category_id = $data['category_id'];
        $sub_category->name = $data['name'];
        $sub_category->slug = $data['slug'];

        // Save the intro
        $sub_category->save();

        return $sub_category;
    }
}
