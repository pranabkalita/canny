<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
  /**
   * Get the validation rules used to validate passwords.
   *
   * @return array
   */
  protected function passwordRules()
  {
    return [
      'required',
      'string',
      'min:10',             // must be at least 10 characters in length
      'regex:/[a-z]/',      // must contain at least one lowercase letter
      'regex:/[A-Z]/',      // must contain at least one uppercase letter
      'regex:/[0-9]/',      // must contain at least one digit
      'regex:/[@$!%*#?&]/', // must contain a special character
      'confirmed'
    ];
  }
}
