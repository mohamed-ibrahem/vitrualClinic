<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class hasRole implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::where('email', $value)->firstOrFail();
        return $user->hasRole('admin');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can login from mobile app only';
    }
}
