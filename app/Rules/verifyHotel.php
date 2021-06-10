<?php

namespace App\Rules;

use App\Models\Hotel;
use Illuminate\Contracts\Validation\Rule;

class verifyHotel implements Rule
{
    private $pastHotel;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Hotel $pastHotel)
    {
        $this->pastHotel = $pastHotel;
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
        $hotel = Hotel::where('name', $value)
            ->first();
        if ($value == $this->pastHotel['name']) return true;
        if (!is_null($hotel)) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Hotel Name must be unique';
    }
}
