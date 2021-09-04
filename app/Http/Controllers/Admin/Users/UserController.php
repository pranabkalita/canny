<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Services\UserService;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\EditUserRequest;
use App\Http\Resources\Admin\Users\UserResource;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
  private UserService $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function index()
  {
    return UserResource::collection($this->userService->allUsers());
  }

  public function store(CreateUserRequest $request)
  {
    $user = $this->userService->createUser(
      $request->except('password')
        +
        ['password' => Hash::make($request->password)]
    );

    return (new UserResource($user))
      ->response()
      ->setStatusCode(Response::HTTP_CREATED);
  }

  public function show($id)
  {
    return new UserResource($this->userService->getUserById($id));
  }

  public function update(EditUserRequest $request, int $id)
  {
    $user = $this->userService->updateUser($id, $request->except('password'));

    return new UserResource($user);
  }

  public function destroy(int $id)
  {
    $this->userService->deleteUser($id);

    return response(null, Response::HTTP_NO_CONTENT);
  }
}
