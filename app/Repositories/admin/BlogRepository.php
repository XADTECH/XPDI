<?php


namespace App\Repositories\admin;

use App\Models\BlogPost;
use App\Models\Category;
use App\Traits\FileUploadTrait; // Import the FileUploadTrait

class BlogRepository
{
    use FileUploadTrait; // Use the FileUploadTrait



    public function saveBlog($data, $photo)
    {
        $blog = new BlogPost();
        // Handle file uploads manually
        if ($photo) {
            $data['post_image'] = $this->uploadFile($photo, 'blog', $blog->post_image);
        }

        // Convert post_tags array to a comma-separated string
        if (isset($data['post_tags']) && is_array($data['post_tags'])) {
            $data['post_tags'] = implode(',', $data['post_tags']);
        }

        return BlogPost::create($data);
    }

    public function updateBlog($data, $photo, $id)
    {
        $blog = BlogPost::find($id);
        // Handle file uploads manually
        if ($photo) {
            $data['post_image'] = $this->uploadFile($photo, 'blog', $blog->post_image);
        }

         // Convert post_tags array to a comma-separated string
         if (isset($data['post_tags']) && is_array($data['post_tags'])) {
            $data['post_tags'] = implode(',', $data['post_tags']);
        }

        $blog->update($data);

        return $blog->fresh();
    }
}
