<?php


namespace App\Repositories\instructor;

use App\Models\Course;
use App\Models\CourseGoal;
use App\Models\CourseLecture;
use App\Traits\FileUploadTrait; // Import the FileUploadTrait

class LectureRepository
{
    use FileUploadTrait; // Use the FileUploadTrait



    public function createLecture($data, $video)
    {
        $lecture = new CourseLecture();

        if ($video) {
            $data['video'] = $this->uploadFile($video, 'video', $lecture->video);
        }

        return CourseLecture::create($data);
    }



    public function updateLecture($data, $video, $id)
    {
        $lecture = CourseLecture::find($id);


        if ($video) {
            $data['video'] = $this->uploadFile($video, 'video', $lecture->video);
        }

        $lecture->update($data);

        return $lecture->fresh();
    }
}
