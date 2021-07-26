<?php

namespace Database\Factories;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shift_type' => 'contracted',
            'shift_day' => $this->faker->dayOfWeek,
            'duties' => 'test duties',
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'user_id' => User::all()->random()->id,
        ];
    }
}
