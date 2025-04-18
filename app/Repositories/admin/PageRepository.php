<?php


namespace App\Repositories\admin;


use App\Models\PageSetting;
use App\Traits\FileUploadTrait; // Import the FileUploadTrait

class PageRepository
{
    use FileUploadTrait; // Use the FileUploadTrait



    public function savePageService($data, $about_image)
    {
        $page_info = PageSetting::find(1); // Fetch the existing record (if any)

        if ($about_image) {
            $data['about_image'] = $this->uploadFile($about_image, 'page-info', $page_info->about_image ?? null);
        }


        // Create or update the record
        $page_info = PageSetting::updateOrCreate(
            ['id' => 1], // Condition to find the existing row
            $data       // Data to update or insert
        );

        return $page_info;
    }
}
