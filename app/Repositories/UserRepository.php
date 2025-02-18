<?php

namespace App\Repositories;

use App\Models\User;


class UserRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function create($data){
        return $this->user->create($data);
    }

    public function updateOrCreate(int $id, $data){
        return $this->user->updateOrCreate(['id' => $id], $data);
    }
}




