<?php

namespace App\Services\admin;

use App\Repositories\admin\ProfileRepository;

class ProfileService
{


    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }


    public function saveProfile(array $data, $photo = null)
    {
        return $this->profileRepository->createOrUpdateProfile($data, $photo);


    }


}
