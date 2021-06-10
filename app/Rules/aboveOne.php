<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class aboveOne implements Rule
{
    private $error_message;

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
        if (!is_numeric($value)) {
            $this->error_message = "Value must be number!";
            return false;
        } else if ($value < 1) {
            $this->error_message = "Value must be above 0!";
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
