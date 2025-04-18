<?php

namespace App\Services\instructor;

use App\Repositories\instructor\LectureRepository;

class LectureService
{


    protected $lectureRepository;

    public function __construct(LectureRepository $lectureRepository)
    {
        $this->lectureRepository = $lectureRepository;
    }


    public function createLecture(array $data, $video = null)
    {
        return $this->lectureRepository->createLecture($data, $video);
    }




    public function updateLecture(array $data, $video = null,  $id)
    {

        return $this->lectureRepository->updateLecture($data,  $video, $id);

    }

    
}
