<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
  use PasswordValidationRules;

  /**
   * Validate and create a newly registered user.
   *
   * @param  array  $input
   * @return \App\Models\User
   */
  public function create(array $input)
  {
    // SFORTIFY: Change the registration fields
    Validator::make($input, [
      'role_id' => ['required', 'integer', 'exists:roles,id'],
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        Rule::unique(User::class),
      ],
      'password' => $this->passwordRules(),
    ])->validate();

    // SFORTIFY: Change the registration fields
    return User::create([
      'role_id' => $input['role_id'],
      'first_name' => $input['first_name'],
      'last_name' => $input['last_name'],
      'email' => $input['email'],
      'password' => Hash::make($input['password']),
    ]);
  }
}
