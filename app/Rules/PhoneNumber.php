<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $error_message;
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
        if (preg_match("/^.*[-].*$/", $value) == true) {
            $this->error_message = "Please do not use dash(-) sign";
            return false;
        } else if (preg_match("/^[+,0].*$/", $value) != true) {
            $this->error_message = "Please start with either 0 or +";
            return false;
        } else if (preg_match("/^[0,+]?[1-9][0-9]{9,14}$/", $value) != true) {
            $this->error_message = "Please insert only numbers ranging from 10 to 15 digits";
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error_message;
    }
}
