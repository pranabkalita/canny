<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
  public function allUsers(): Collection
  {
    return User::where('is_superuser', false)->get();
  }

  public function createUser(array $data): User
  {
    return User::create($data);
  }

  public function getUserById(int $id)
  {
    return User::findOrFail($id);
  }

  public function updateUser(int $id, array $data)
  {
    $user = $this->getUserById($id);
    $user->update($data);

    return $user;
  }

  public function deleteUser(int $id): void
  {
    $user = $this->getUserById($id);
    if ($user->is_superuser) {
      abort(403, 'Can not delete !');
    }

    $user->delete();
  }
}
