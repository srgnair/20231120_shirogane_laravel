<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContactRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/\A\d{3}[-]\d{4}\z/', $value);
        //return preg_match("/^[0-9]{3}-[0-9]{4}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '郵便番号が正しくありません';
    }
}
