<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{
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
      'role_id' => ['nullable', 'integer', 'exists:roles,id'],
      'first_name' => ['sometimes', 'string', 'min:2', 'max:255'],
      'last_name' => ['sometimes', 'string', 'min:2', 'max:255'],
      'email' => [
        'sometimes',
        'string',
        'email',
        'max:255',
        Rule::unique(User::class),
      ],
    ];
  }
}
