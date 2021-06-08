<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkOut implements Rule
{
    private $checkin;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($checkin)
    {
        $this->checkin = $checkin;
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
        if (is_null($this->checkin)) {
            return false;
        } else if ($value > $this->checkin) {
            return true;
        } else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Check out date must be greater than Check in date!';
    }
}
