<?php

namespace App\Services\admin;

use App\Repositories\admin\CategoryRepository;

class CategoryService
{


    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function saveCategory(array $data, $photo = null)
    {
        return $this->categoryRepository->saveCategory($data, $photo);

    }

    public function updateCategory(array $data, $photo = null, $id)
    {
        return $this->categoryRepository->updateCategory($data, $photo, $id);

    }


}
