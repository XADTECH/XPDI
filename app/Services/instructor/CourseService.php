<?php

namespace App\Services\instructor;

use App\Repositories\instructor\CourseRepository;

class CourseService
{


    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }


    public function createCourse(array $data, $photo = null, $video = null)
    {
        return $this->courseRepository->createCourse($data, $photo, $video);
    }

    public function createCourseGoals($courseId, array $goals)
    {
        return $this->courseRepository->createCourseGoals($courseId, $goals);
    }


    public function updateCourse(array $data, $photo = null, $video = null,  $id)
    {

        return $this->courseRepository->updateCourse($data, $photo, $video, $id);

    }

    public function updateCourseGoals($courseId, array $goals)
    {
        return $this->courseRepository->updateCourseGoals($courseId, $goals);
    }
}
