<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class CreateUserRequest extends FormRequest
{
  use PasswordValidationRules;

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
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
      'password' => $this->passwordRules()
    ];
  }

  public function messages()
  {
    return [
      'password.required' => 'User must have a password.',
      'password.min' => 'Password must be of minimum 10 characters.',
      'password.regex' => 'Password must have a capital character, special character and a number.'
    ];
  }
}
