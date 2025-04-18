<?php

namespace App\Services\admin;

use App\Repositories\admin\BlogRepository;
use App\Repositories\admin\CategoryRepository;

class BlogService
{


    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    public function saveBlog(array $data, $photo = null)
    {
        
        return $this->blogRepository->saveBlog($data, $photo);

    }

    public function updateBlog(array $data, $photo = null, $id)
    {
        return $this->blogRepository->updateBlog($data, $photo, $id);

    }


}
