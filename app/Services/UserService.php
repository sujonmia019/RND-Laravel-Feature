<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function all()
    {
        return $this->userRepository->getAll();
    }

    public function userStore($data){
        return $this->userRepository->create($data);
    }

    public function updateOrCreate($id, $data){
        return $this->userRepository->updateOrCreate($id, $data);
    }

}



