<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function userList(){
        return response()->json($this->userService->all());
    }

    public function store(UserRequest $request){
        $data = $this->userService->userStore($request->validated());
        return response()->json($data,201);
    }

    public function storeOrUpdate(UserRequest $request){
        $data = $this->userService->updateOrCreate($request->id,$request->validated());
        return response()->json($data,200);
    }
}
