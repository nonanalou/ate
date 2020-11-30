<?php

namespace App\Models;

use Laravel\Fortify\Rules\Password;

class PasswordRules extends Password
{
    protected $requireNumeric = true;
    protected $requireSpecialCharacter = true;
}
