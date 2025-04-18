<?php

namespace App\Services\admin;

use App\Repositories\admin\PasswordUpdateRepository;

class PasswordUpdateService
{


    protected $passwordUpdateRepository;

    public function __construct(PasswordUpdateRepository $passwordUpdateRepository)
    {
        $this->passwordUpdateRepository = $passwordUpdateRepository;
    }


    public function updatePassword(array $data)
    {
        return $this->passwordUpdateRepository->updatePassword($data);


    }


}
