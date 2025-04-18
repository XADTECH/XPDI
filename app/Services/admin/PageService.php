<?php

namespace App\Services\admin;

use App\Repositories\admin\PageRepository;

class PageService
{


    protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }


    public function savePageService(array $data, $about_image = null)
    {
        return $this->pageRepository->savePageService($data, $about_image);

    }




}
