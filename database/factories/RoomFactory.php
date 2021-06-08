<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomDigitNotZero(),
            'room_total' => $this->faker->randomDigitNotZero(),
            'facility' => $this->faker->sentence(),
            'room_image' => 'placeholder1.jpg',
        ];
    }
}
