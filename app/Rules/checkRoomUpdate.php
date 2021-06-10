<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkRoomUpdate implements Rule
{
    private $roomordered;
    private $error_message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($roomordered)
    {
        $this->roomordered = $roomordered;
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
            $this->error_message = "Room Input must be number!";
            return false;
        } else if ($value < 1) {
            $this->error_message = "Room input must be above 0!";
            return false;
        } else if ($value < $this->roomordered) {
            $this->error_message = "Room Input must be above " . $this->roomordered . " because there are already " . $this->roomordered . " rooms ordered!!";
            return false;
        } else
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
