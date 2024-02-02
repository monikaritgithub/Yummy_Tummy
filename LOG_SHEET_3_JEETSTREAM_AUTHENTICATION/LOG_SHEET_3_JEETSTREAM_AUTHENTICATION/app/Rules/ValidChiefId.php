<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidChiefId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        // Check if a user with role 0 exists
        $user = User::where('role', 0)->first();

        return $user !== null;
    }

    public function message()
    {
        return 'User with role 0 not found in the user table.';
    }
}
