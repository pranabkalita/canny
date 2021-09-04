<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class UserService
{
  public function allUsers()
  {
    return User::where('is_superuser', false)->get();
  }

  public function createUser(array $data)
  {
    return User::create($data);
  }
}
