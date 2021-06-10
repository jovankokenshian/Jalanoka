<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class locationCheck implements Rule
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
        if (!($value == 'Jakarta' || $value == "Surabaya" || $value == "Palembang")) {
            $this->error_message = "Location name must be Jakarta, Surabaya, or Palembang";
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
